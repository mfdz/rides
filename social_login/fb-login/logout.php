<?php
include './fb-init.php';
session_destroy();
unset($_SESSION['access token']);
header("Location:index.php");


