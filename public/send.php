<?php
ini_set('display_errors', 'On');
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
    if(isset($prop[0]) && isset($prop[1])){
        $config[$prop[0]] = $prop[1];
    }
}

$gmail_user = $config['GMAIL_USER'];
$gmail_password = $config['GMAIL_PASSWORD'];

$data = json_decode( file_get_contents('php://input') , true);

if(isset($data['from']) && isset($data['to']) && isset($data['adults']) && isset($data['children']) && isset($data['email']) && isset($data['name'])){
    $mail= new PHPMailer();
    $mail->CharSet="UTF-8";
    $mail->IsSMTP(); // telling the class to use SMTP
    $mail->Host       = "smtp.gmail.com"; // SMTP server
    //$mail->SMTPDebug  = 2;
    $mail->SMTPAuth   = true;                  // enable SMTP authentication
    $mail->Host       = "smtp.gmail.com"; // sets the SMTP server
    $mail->Port       = 465;
    $mail->SMTPSecure = 'ssl';
    $mail->Username   = $gmail_user; // SMTP account username
    $mail->Password   = $gmail_password;        // SMTP account password
    $mail->SetFrom($gmail_user, "Aquila Website");
    $mail->AddReplyTo($gmail_user, "Aquila Website");
    $mail->AddAddress($gmail_user, "Aquila Website");
    $mail->AddAddress($data['email'], $data['name']);
    $mail->Subject  = "New booking from ".$data['name'];
    $message = "";
    foreach($data as $field => $value){
        $message.= '<b>'.$field.'</b>: '.$value.'<br>';
    }
    $mail->MsgHTML($message);
    $result = $mail->Send();
}