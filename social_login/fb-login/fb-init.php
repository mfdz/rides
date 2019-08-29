<?php

//start the session
session_start();

//include autoload file from vendor folder
require_once  __DIR__ .'/vendor/autoload.php';


$fb = new Facebook\Facebook([
   'app_id' => '2445341199071325',
   'app_secret' => 'a575a8461be4643a6908a28c71738654',
   'default_graph_version' => 'v2.7'
]);

$helper = $fb->getRedirectLoginHelper();
$login_url = $helper->getLoginUrl("http://localhost:8080/fb-login");

//print_r($login_url);

try{

   $accessToken = $helper->getAccessToken();
   if(isset($accessToken)){
       $_SESSION['access_token'] = (string)$accessToken; //conver to string

       //if session is se we can redirect to the user to any page
       header("Location:index.php");

   }

}catch (Exception $exc){
    echo  $exc->getTraceAsString();
}


//now we will get users first name, email, last name
if(isset($_SESSION['access_token'])){

    try {

    $fb->setDefaultAccessToken($_SESSION['access_token']);
    $res = $fb->get('/me?locale=en_US&fields=name,email');
    $user = $res->getGraphUser();
    echo 'Hello,',$user->getField('name');

} catch (Exception $exc){
        echo  $exc->getTraceAsString();
    }
}