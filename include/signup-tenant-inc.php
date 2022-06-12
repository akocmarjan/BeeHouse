<?php
if(isset($_POST['submit']))
{

    $email = $_POST['email'];
    $username = $_POST['username'];
    $firstname = $_POST['firstName'];
    $lastname = $_POST['lastName'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $con_password = $_POST['conPassword'];

    include '../classes/dbh-classes.php';
    include '../classes/signup-tenant-classes.php';
    include '../classes/signup-tenant-contr-classes.php';

    $signup = new SignupContr($username, $email, $password, $con_password, $firstname, $lastname, $gender,$phone, $hashed_password);

    $signup->signupUser();

    header("location: ../listing.php?error=none");
}
?>