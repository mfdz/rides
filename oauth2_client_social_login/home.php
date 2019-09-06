<!DOCTYPE html>
<html>
<body>



<?php

require __DIR__ . '/vendor/autoload.php';

session_start();

$provider = new \League\OAuth2\Client\Provider\Facebook([
    'clientId'          => '2445341199071325',
    'clientSecret'      => 'a575a8461be4643a6908a28c71738654',
    'redirectUri'       => 'http://localhost:8080/index.php',
    'graphApiVersion'   => 'v2.10',
]);

if (!isset($_GET['code'])) {

    // If we don't have an authorization code then get one
    $authUrl = $provider->getAuthorizationUrl([
        'scope' => ['email'],
    ]);
    $_SESSION['oauth2state'] = $provider->getState();

    echo '<a href="'.$authUrl.'">Log in with Facebook!</a>';
    exit;

// Check given state against previously stored one to mitigate CSRF attack
} elseif (empty($_GET['state']) || ($_GET['state'] !== $_SESSION['oauth2state'])) {

    unset($_SESSION['oauth2state']);
    echo 'Invalid state.';
    exit;

}

// Try to get an access token (using the authorization code grant)
$token = $provider->getAccessToken('authorization_code', [
    'code' => $_GET['code']
]);


try {

    // We got an access token, let's now get the user's details
    $user = $provider->getResourceOwner($token);
    // Use these details to create a new profile
    echo "<h2>Welcome home page</h2> ";

    printf('Hello %s!', $user->getFirstName());

    echo '<pre>';
    $name = $user->getName();
    printf('User Name: %s!', $user->getName());

    # object(League\OAuth2\Client\Provider\FacebookUser)#10 (1) { ...
    echo '</pre>';

    echo '<pre>';
    $email = $user->getEmail();
    printf('User Email: %s!', $user->getEmail());
    echo '</pre>';

    echo '</pre>';
    $pictureUrl = $user->getPictureUrl();
    printf('User PictureUrl: %s', $user->getPictureUrl());
    echo '</pre>';

} catch (\Exception $e) {

    // Failed to get user details
    exit('Oh dear...');
}
?>

</body>
</html>







