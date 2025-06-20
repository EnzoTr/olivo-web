<?php
require("class.phpmailer.php");
require("class.smtp.php");

$mail = new PHPMailer();
$mail->isSMTP();

$mail->Host = "mail.elolivobuffet.com.ar";
$mail->Port = 465;
$mail->SMTPAuth = true;
$mail->SMTPSecure = true;

$mail->Username = 'contacto@elolivobuffet.com.ar';
$mail->Password = 'ElOlivo-2020.RaC_Ram';

$mail->From = 'contacto@elolivobuffet.com.ar';
$mail->FromName = "Contacto desde sitio Web";
$mail->AddAddress('elolivobuffet@gmail.com', "destinatario");

$mail->WordWrap = 50;
$mail->IsHTML(true);

$mail->Subject = "Contacto desde el sitio web";
$mail->Body    = "<b>Nombre: </b>".$_POST['Nombre']."<br />"."<b>Tel: </b>".$_POST['Tel']."<br />"."<b>Email: </b>".$_POST['Email']."<br />"."<b>Mensaje: </b>".$_POST['Mensaje'];

$mail->SMTPOptions = array(
'ssl' => array(
'verify_peer' => false,
'verify_peer_name' => false,
'allow_self_signed' => true
)
);


if(!$mail->Send())

{
   echo "Error al enviar. <p>";
   echo "Mailer Error: " . $mail->ErrorInfo;
   exit;
}

echo "Mensaje enviado!";

?> 
<!DOCTYPE HTML>
<html lang="es">
<head>
	<script>alert("Gracias por Contactarnos. Responderemos su consulta lo antes posible.");</script>
	<meta HTTP-EQUIV="REFRESH" content="0; url=../index.php"> 
</head>

