<?php
  session_start();
  if (isset($_GET['idioma']) && !empty($_GET['idioma'])) {
    $idioma = strtolower($_GET['idioma']);
    $_SESSION['idioma'] = strtolower($_GET['idioma']);
  }
  else { $idioma='es'; $_SESSION['idioma'] = 'es'; }

include_once ("inc/". $_SESSION['idioma'] ."_traduccion.php");

?>
