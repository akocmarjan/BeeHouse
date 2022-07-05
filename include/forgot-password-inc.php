<?php
if(isset($_POST['submit']))
{

    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);

    $url = "http://beebhouse-001-site1.ftempurl.com/create-new-password.php?selector=" . $selector . "&validator=" . bin2hex($token);

    $expires = date("U") + 1800;

    $email = $_POST['email'];

    include '../classes/dbh-classes.php';
    include '../classes/reset-password-classes.php';
    include '../classes/reset-password-contr-classes.php';

    $pwd = new resetPasswordContr($email, $token, $selector, $expires);
    $pwd->checkpwd();
    $username = $pwd->checkpwd();
    $pwd->delpwd();
    $pwd->inspwd();
    
    

    $to = $email;

    $subject = 'Reset your password for Bee House';

    $message = '<p>We recieved a password reset request. The link to your password is below. If you did not make this request, you can ignore this email.</p>';
    $message .= '<p>Here is your password reset link: .</br>';
    $message .= '<a href="' . $url . '">' . $url . '</a></p>';

    $headers = "From: BeeHouse <akocmarjan2@gmail.com>\r\n";
    $headers = "Reply-To: akocmarjan2@gmail.com\r\n";
    $headers = "Content-type: text/html\r\n";

    mail($to, $subject, $message, $headers);

    // header("location: ../forgot-password.php?error=success");
    header("location: ../create-new-password.php?selector=" . $selector . "&validator=" . bin2hex($token) . "&username=" . $username);
}else{
    header("location: ../index.php?error=none");
}
?>