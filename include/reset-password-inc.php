<?php
if(isset($_POST['submit']))
{

    $selector = $_POST['selector'];
    $validator = $_POST['validator'];
    $url = $_POST['url'];
    $password = $_POST['password'];
    $conpassword = $_POST['conpassword'];

    include '../classes/dbh-classes.php';
    include '../classes/reset-password-classes.php';
    include '../classes/reset-password-contr-classes.php';

    if(empty($password) || empty($conpassword)){
        header("location: ../create-new-password.php?error=empty");
        exit();
    }else if($password != $conpassword){
        header("location: ".$url."&error=pwdnotmatch");
        exit();
    }

    $currentDate = date("U");

    $pwd = new resetPasswordContr($validator, $password, $selector, $currentDate);
    $pwd->selpwd();

    

    header("location: ../index.php?error=resetpasswordsuccess");
}else{
    header("location: ../forgot-password.php?error=asas");
}
?>