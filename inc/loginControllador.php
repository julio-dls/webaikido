<?php

class LoginControllador {

  private $con;

	function __construct($con){
		$this->con = $con;
	}

  function VerificarUsuario($data = array()){

    if(!empty($data['nombre_usuario']) AND !empty($data['pass'])) {

      $resultado = $this->con->query("SELECT `nombre`, `password` FROM `iwama-ryu-art-usuarios` WHERE `nombre` = '".$data['nombre_usuario']."' and `password` = '".md5($data['pass'])."' ")->fetch();

      if (!empty($resultado['nombre']) and !empty($resultado['password'])) {
          $_SESSION['usuario'] = $resultado['nombre'];
          $_SESSION['password'] = $resultado['password'];
          redirect('panel.php');
      } else {
          echo "<script>alert('El usuario o el password son incorrectos, por favor intente otra vez.');</script>";
          redirect('login.php');
      }
    }
  }
  // CORROBORAR QUE ESTA LOGUEADO
  function isLog() {
    if(!isset($_SESSION['usuario']) and !isset($_SESSION['password'])) {
      redirect('login.php');
    }
  }

  // ELIMINAR USUARIO
  function logout($datos = array()){
    if(isset($datos['logout'])){
      unset($_SESSION['usuario']);
      unset($_SESSION['password']);
      unset($_SESSION['privilegios']);
    }
  }
}
  //funcion para cambiar de pagina
  function redirect($pURL) {
    if (strlen($pURL) > 0)	{
      if (headers_sent())	{
        echo "<script>document.location.href='".$pURL."';</script>\n";
      } else {
        header("Location: " . $pURL);
      }
      exit();
    }
}
?>
