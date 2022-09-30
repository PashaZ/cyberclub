<?php
  $body = "";
  $to = "contact@playerpl.com";
  $subject = "Title of letter";

  if (trim(!empty($_POST['name']))){
      $body.='<p><strong>Név:</strong> '.$_POST['name'].'</p>';
  }
  if (trim(!empty($_POST['phone']))){
      $body.='<p><strong>Név:</strong> '.$_POST['phone'].'</p>';
  }
  if (trim(!empty($_POST['comment']))){
      $body.='<p><strong>Név:</strong> '.$_POST['comment'].'</p>';
  }
  
  $message = "
    <html>
    <head>
      <title>$subject</title>
    </head>
    <body>
      $body 
    </body>
    </html>
    ";
  $headers[] = 'MIME-Version: 1.0';
  $headers[] = 'Content-type: text/html; charset=utf-8';
  $headers[] = 'From: info@polishplayer.com';

  if(!mail($to, $subject, $message, implode("\r\n", $headers))){
      $message = "Hiba";
  } else{
      $message = 'Adatok elküldve!';
  }

  $response = ['message' => $message];

  header('Content-type: application/json');
  echo json_encode($response);
?>