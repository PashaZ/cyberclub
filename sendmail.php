<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/Exception.php';


require 'vendor/autoload.php';


$mail = new PHPMailer(true);
$mail -> CharSet='UTF-8';
$mail->isHTML(true);

$mail->setFrom('cyberclub@example.com', 'CyberclubMailer');
$mail->addAddress('pavel.zakernychnyy.qs@gmail.com', 'Admin');
$mail->Subject = 'Title of letter';


if (trim(!empty($_POST['name']))){
    $body.='<p><strong>Імя:</strong> '.$_POST['name'].'</p>';
}
if (trim(!empty($_POST['phone']))){
    $body.='<p><strong>Імя:</strong> '.$_POST['phone'].'</p>';
}
if (trim(!empty($_POST['comment']))){
    $body.='<p><strong>Імя:</strong> '.$_POST['comment'].'</p>';
}

$mail->Body=$body;

if(!$mail->send()){
    $message = "Помилка";
} else{
    $message = 'Дані відправлені!';
}

$response = ['message' => $message];

header('Content-type: application/json');
echo json_encode($response);
?>



