<?php
session_start();
require_once('classes/User.php');
if (empty($_SESSION["user"])) {
  header("location:index.php?error=login_first");
}else{
    // IT
  $user =  unserialize($_SESSION["user"]);
  // filter and validation
    $id  = $_GET["course_id"];
        
    $rslt =$user->delete_course( $id);
    // var_dump($rslt);
   
    header("location:courses.php");
   
}










