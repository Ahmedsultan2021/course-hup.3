<?php
session_start();
require_once('classes/User.php');
if (empty($_SESSION["user"])) {
  header("location:index.php?error=login_first");
}else{
    // IT
  $user =  unserialize($_SESSION["user"]);
  // filter and validation
    $name  = $_POST["name"];
    $role  = $_POST["role"];
    $email  = $_POST["email"];

    $new_user =new User($name ,$email);
    $new_user->role =$role;
  
    $rslt =$user->create_user($new_user);
    if ($rslt ==true){
        header("location:users.php");
    }else{
        header("location:user_add.php?error=db_error");
    }




}





