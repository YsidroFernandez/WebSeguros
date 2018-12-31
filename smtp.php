<?php
 include("conexion.php");
//include ('/PHPMailerAutoload.php');
 @
 require '../PHPMailerAutoload.php';
$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPDebug = 0;
$mail->Debugoutput = 'html';
$mail->Host = "127.0.0.1";//
$mail->Port = 25;
$mail->SMTPAuth = true;
$mail->Username = "elunico_falcon@hotmail.com";
$mail->Password = "Eswsdwwd24145115";
$mail->setFrom('elunico_falcon@hotmail.com', $_POST['nombre']);
$mail->addAddress($_POST['correo']);
$mail->Subject = 'Prueba PHPMailer SMTP';
$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
$mail->AltBody = 'Una descripcion del mensaje';
$mail->addAttachment('images/imagen_adjunta.png');
 
if (!$mail->send()) {
    echo "Error: " . $mail->ErrorInfo;
} else {
    echo "Correo enviado!";
} 
?>