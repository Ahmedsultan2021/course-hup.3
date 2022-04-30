<?php 
session_start();
if (!empty($_POST["email"]) && !empty($_POST["pw"])){


$email = htmlspecialchars( trim($_POST["email"]));
$pw = $_POST["pw"];

require_once('classes/User.php');

$user =User::login($email ,md5($pw));

// var_dump($user);
if (!empty($user)){
    $_SESSION["user"] =serialize( $user);    
    // var_dump($user);
    // var_dump($_SESSION["user"] );
    header("location:home.php");
}else{
    header("location:index.php?error=invalid_login");
}

}else{
    header("location:index.php?error=empty");
}