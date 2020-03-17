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
    $message .= "<b>E-Mail</b>: ".$data['email']."<br>";
    $message .= "<b>Name</b>: ".$data['name']."<br>";
    $message .= "<b>Arrival date</b>: ".$data['from']."<br>";
    $message .= "<b>Leaving date</b>: ".$data['to']."<br>";
    $message .= "<b>Adults</b>: ".$data['adults']."<br>";
    $message .= "<b>Children</b>: ".$data['children']."<br>";
    if($data['message'] != ''){
        $message .= "<b>Message</b>: ".$data['message']."<br>";
    }
    $mail->MsgHTML($message);
    $result = $mail->Send();
    print_r($result);
}