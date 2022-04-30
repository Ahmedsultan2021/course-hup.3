<?php
session_start();
require_once('classes/User.php');
if (empty($_SESSION["user"])) {
  header("location:index.php?error=login_first");
}else{
    // IT
    $user =  unserialize($_SESSION["user"]);
    // filter and validation
    // `code`, `name`, `creadit_hours`, `seats_no`, `professor_id`, `tuition` 

    $name  = $_POST["name"];
    $creadit_hours  = $_POST["creadit_hours"];
    $seats_no  = $_POST["seats_no"];
    $professor_id  = $_POST["professor_id"];
    $tuition  = $_POST["tuition"];

    require_once("classes/Course.php");
    $course =new Course($name , $creadit_hours,$seats_no,$professor_id,$tuition);
     
    $rslt =$user->create_course($course);
    if ($rslt ==true){
        header("location:courses.php");
    }else{
        header("location:course_add.php?error=db_error");
    }




}





