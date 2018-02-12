<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once ('phpmailer/src/Exception.php');
require_once ('phpmailer/src/PHPMailer.php');
require_once ('phpmailer/src/SMTP.php');

class SendEmail {
  private $con;
  const SECRET_PASS = 'emailchino18';
  const SECRET_USER = 'chinoyuen@iwama-ryu-art.com';

  function __construct($con) {
    $this->con=$con;
  }

  function sendMail($data = array()) {
    if (!empty($data['nombreContacto']) && !empty($data['emailContacto']) && !empty($data['messageContacto'])) {
      try {
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->Host = 'mx1.hostinger.com.ar';
        $mail->SMTPAuth = true;
        $mail->Username = self::SECRET_USER;
        $mail->Password = self::SECRET_PASS;
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->setFrom($data['emailContacto']);
        $mail->addAddress(self::SECRET_USER);
        $mail->isHTML(true);
        $mail->Subject  = "Consutla desde pagina de: " .$data['subjectContacto'];
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
          '</body>'.
        '</html>';
        $mail->send();
    } catch (Exception $e) {
        echo $e->errorMessage(); //Pretty error messages from PHPMailer
    } catch (\Exception $e) {
        echo $e->getMessage(); //Boring error messages from anything else!
    }
  }
}
}
?>
