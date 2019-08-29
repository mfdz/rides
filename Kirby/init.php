<?php

function goToAuthUrl()
{
$client_id = "";
$redirect_url = "";
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
$url = 'GET https://github.com/login/oauth/authorize='. $client_id. "&redirect_url=".$redirect_url."&scope=user";
header("location: $url");
}
}

function fetchData()
{

}
