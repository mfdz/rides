<?php

#use League\OAuth2\Client\Provider\Facebook;
#use League\OAuth2\Client\Provider\FacebookUser;
#use League\OAuth2\Client\Provider;

require __DIR__ . '/vendor/autoload.php';


session_start();

$provider = new \League\OAuth2\Client\Provider\Facebook([
    'clientId'          => '145547486306267',
    'clientSecret'      => '71fc47dc25a3fa40fc8424af3cf3dcbb',
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

// Optional: Now you have a token you can look up a users profile data
try {

    // We got an access token, let's now get the user's details
    $user = $provider->getResourceOwner($token);

    // Use these details to create a new profile
    printf('Hello %s!', $user->getFirstName());
    
    echo '<pre>';
    var_dump($user);
    # object(League\OAuth2\Client\Provider\FacebookUser)#10 (1) { ...
    echo '</pre>';

} catch (\Exception $e) {

    // Failed to get user details
    exit('Oh dear...');
}

echo '<pre>';
// Use this to interact with an API on the users behalf
var_dump($token->getToken());
# string(217) "CAADAppfn3msBAI7tZBLWg...

// The time (in epoch time) when an access token will expire
var_dump($token->getExpires());
# int(1436825866)
echo '</pre>';
//echo "helobelo";





/*
$user = $provider->getResourceOwner($token);

$id = $user->getiId();
var_dump($id);

*/