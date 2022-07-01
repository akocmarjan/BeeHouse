<?php
if(isset($_POST['submit']))
{

    $username = $_POST['username'];
    $password = $_POST['password'];
   
    include '../classes/dbh-classes.php';
    include '../classes/signin-admin-classes.php';
    include '../classes/signin-admin-contr-classes.php';

    $signin = new SigninContr($username, $password);

    $signin->signinUser();

    header("location: ../admin-dashboard.php?error=none");
}
?>