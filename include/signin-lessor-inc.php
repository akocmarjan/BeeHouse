<?php
if(isset($_POST['submit']))
{

    $username = $_POST['username'];
    $password = $_POST['password'];
   
    include '../classes/dbh-classes.php';
    include '../classes/signin-lessor-classes.php';
    include '../classes/signin-lessor-contr-classes.php';

    $signin = new SigninContr($username, $password);

    $signin->signinUser();

    header("location: ../dashboard-partner-dashboard.php?error=none");
}
?>