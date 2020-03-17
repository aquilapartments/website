<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../phpmailer/Exception.php';
require '../phpmailer/PHPMailer.php';
require '../phpmailer/SMTP.php';

$myfile = fopen("../phpmailer/.env", "r") or die("Unable to open file!");
$dotenv = fread($myfile,filesize("../phpmailer/.env"));
$dotenv = explode("\n",$dotenv);
$config = array();
foreach($dotenv as $prop){
    $prop = explode('=',$prop);
    $config[$prop[0]] = $prop[1];
}

$gmail_user = $config['GMAIL_USER'];
$gmail_password = $config['GMAIL_PASSWORD'];

if(isset($_POST['from']) && isset($_POST['to']) && isset($_POST['adults']) && isset($_POST['children']) && isset($_POST['email']) && isset($_POST['name'])){
    $mail= new PHPMailer();
    $mail->CharSet="UTF-8";
    $mail->IsSMTP(); // telling the class to use SMTP
    $mail->Host       = "smtp.gmail.com"; // SMTP server
    $mail->SMTPDebug  = 2;
    $mail->SMTPAuth   = true;                  // enable SMTP authentication
    $mail->Host       = "smtp.gmail.com"; // sets the SMTP server
    $mail->Port       = 465;
    $mail->SMTPSecure = 'ssl';
    $mail->Username   = $gmail_user; // SMTP account username
    $mail->Password   = $gmail_password;        // SMTP account password
    $mail->SetFrom($gmail_user, "Aquila Website");
    $mail->AddReplyTo($gmail_user, "Aquila Website");
    $mail->AddAddress($gmail_user, "Aquila Website");
    $mail->AddAddress($_POST['email'], $_POST['name']);
    $mail->Subject  = "New booking from ".$_POST['name'];
    $mail->MsgHTML("New booking");
    $result = $mail->Send();
    print_r($result);
}