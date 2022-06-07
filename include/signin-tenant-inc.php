<?php
if(isset($_POST['submit']))
{

    $username = $_POST['username'];
    $password = $_POST['password'];
   
    include '../classes/dbh-classes.php';
    include '../classes/signin-tenant-classes.php';
    include '../classes/signin-tenant-contr-classes.php';

    $signin = new SigninContr($username, $password);

    $signin->signinUser();

    header("location: ../index.php?error=none");
}
?>