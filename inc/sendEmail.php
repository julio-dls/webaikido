<?php
use PHPMailer\PHPMailer\PHPMailer;

require_once ('phpmailer/src/PHPMailer.php');
require_once ('phpmailer/src/SMTP.php');
/*
* SMTP
* Host:	smtp.mailtrap.io
* Port:	25 or 465 or 2525
* Username:	095854ad93c9d4
* Password:	8b7d99ed39a6ea
* Auth:	PLAIN, LOGIN and CRAM-MD5
* TLS:	Optional
*/
class SendEmail {
  private $con;
  const SECRET_PASS = 'jWbiiaG0';
  const SECRET_USER = 'quirogajulio27@gmail.com';

  function __construct($con) {
    $this->con=$con;
  }

  function sendMail($data = array()) {
    if (!empty($data['nombreContacto']) && !empty($data['emailContacto']) && !empty($data['messageContacto'])) {
      $mail = new PHPMailer;
      $mail->isSMTP();
      $mail->Host = 'smtp.gmail.com';//'smtp.mailtrap.io';
      $mail->SMTPAuth = true;
      $mail->Username = self::SECRET_USER;
      $mail->Password = self::SECRET_PASS;
      $mail->SMTPOptions = array('ssl' => array('verify_peer' => false,'verify_peer_name' => false,'allow_self_signed' => true));
      $mail->SMTPSecure = '';
      // $mail->Port = 25;
      $mail->Port = 25 or 465 or 587;
      $mail->setFrom($data['emailContacto']);                                           //REMITENTE
      $mail->addAddress(self::SECRET_USER);                                     //DESTINATARIO
      $mail->isHTML(true);                                                      //EL CORREO SE ENVIA COMO HTML
      $mail->Subject  = "Consutla desde pagina de: " .$data['subjectContacto'];                         //ASUNTO
      $mail->Body =
      '<!DOCTYPE html>'.
      '<html>'.
        '<head>'.
          '<meta charset="utf-8">'.
          '<title>Tribu Cuero</title>'.
          '<meta http-equiv="content-type" content="text/html; charset=UTF-8" />'.
        '</head>'.
        '<body>'.
          '<h2>Consulta Realizada desdes pagina web.</h2><br />'.
          '<h3>'.$data['messageContacto'].'</h3>'.
          '<hr>'.
          '<h4>Datos de contacto:</h4>'.
          '<h5>Nombre: '.$data['nombreContacto'].'</h5>'.
          '<h5>Email: '.$data['emailContacto'].'</h5>'.
          // '<h6>Ciudad: '.$data['subjectContacto'].'</h6>'.
          // '<h6>Telefono: '.$data['phone'].'</h6>'.
          // '<h6>Donde nos Conocio: '.$data['options'].'</h6>'.
        '</body>'.
      '</html>';
      $mail->send();
      // if(!$mail->send()) { echo 'Mailer error: ' .$mail->ErrorInfo; }
      // else { echo '<script>alert("mensaje de alerta");</script>'; }
    }
  }
}
?>
