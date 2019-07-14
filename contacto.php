<?php
/**
 * @version 1.0
 */

require("class.phpmailer.php");
require("class.smtp.php");

// Valores enviados desde el formulario
if ( !isset($_POST["nombre"]) || !isset($_POST["email"]) || !isset($_POST["mensaje"]) ) {
    die ("Es necesario completar todos los datos del formulario");
}
$nombre = $_POST["nombre"];
$email = $_POST["email"];
$mensaje = $_POST["mensaje"];
$telefono = $_POST["telefono"];

// Datos de la cuenta de correo utilizada para enviar vía SMTP
$smtpHost = "c1590313.ferozo.com";  // Dominio alternativo brindado en el email de alta 
$smtpUsuario = "info@ghl-leathers.com.ar";  // Mi cuenta de correo
$smtpClave = "Ghl432ghl";   // Mi contraseña

// Email donde se enviaran los datos cargados en el formulario de contacto
$emailDestino = "guidomontorfano78@gmail.com";

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Port = 465; 
$mail->SMTPSecure = 'ssl';
$mail->IsHTML(true); 
$mail->CharSet = "utf-8";


// VALORES A MODIFICAR //
$mail->Host = $smtpHost; 
$mail->Username = $smtpUsuario; 
$mail->Password = $smtpClave;

$mail->From = $email; // Email desde donde envío el correo.
$mail->FromName = $nombre;
$mail->AddAddress($emailDestino); // Esta es la dirección a donde enviamos los datos del formulario

$mail->Subject = "Nuevo Email"; // Este es el titulo del email.
$mensajeHtml = nl2br($mensaje);
$mail->Body = "Nombre: {$nombre}<br/><br/>
               Consulta: {$mensajeHtml} <br /><br />
               Teléfono: {$telefono}"; // Texto del email en formato HTML
$mail->AltBody = "{$mensaje}"; // Texto sin formato HTML
// FIN - VALORES A MODIFICAR //

$estadoEnvio = $mail->Send(); 
if($estadoEnvio){
    echo '<script type="text/javascript">
           window.location.href="index.html#contacto";
		   alert("Mensaje Enviado Correctamente");	           
		   </script>';
} else {
    echo '<script type="text/javascript">
		   alert("Ocurrio un error durante el envio del formulario, intente nuevamente mas tarde");	
		   window.location.href="index.html";
		   </script>';
}

