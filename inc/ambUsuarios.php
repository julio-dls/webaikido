<?php
/**
 *
 */
class AbmUsuarios {

  private $con;

  function __construct($con) {
    $this->con=$con;
  }

  function NuevoUsuario($data = array()) {
    $QueryPermisos = $this->con->query("SELECT `permiso`
                                        FROM `iwama-ryu-art-usuarios`
                                        WHERE `permiso` = '".$_SESSION['permiso']."' ")->fetch();
    $Permisos = $QueryPermisos['0'];
    if ($Permisos == "administrador") {

      $sqlInsert = ("INSERT INTO `iwama-ryu-art-usuarios`(`nombre`, `email`, `password`, `permiso`)
                    VALUES ('".$data['nombre_usuario']."', '".$data['email_usuario']."', '".md5($data['password_usuario'])."','".$data['permiso_usuario']."' )");
      $insertUser = $this->con->exec($sqlInsert);
      // print_r($this->con->errorInfo());

      if ($insertUser) {
        redirect('bmUsuario.php');
      } else { echo '<script>alert("El usuarios no se registro correctamente");</script>'; }
    } else { echo '<script>alert("Usted no tiene permiso suficiente");</script>'; }
  }

  function Eliminar($data = array()) {
    $QueryPermisos = $this->con->query("SELECT `permiso`
                                        FROM `iwama-ryu-art-usuarios`
                                        WHERE `permiso` = '".$_SESSION['permiso']."' ")->fetch();
    $Permisos = $QueryPermisos['0'];
    if ($Permisos == "administrador") {
      $del = "DELETE FROM `iwama-ryu-art-usuarios` WHERE id =".$data['eliminar_usuario']." ";
      $delImg = $this->con->exec($del);

      if ($delImg) { echo "<script>alert('El usuario fue eliminado correctamente');</script>"; }
    } else { echo '<script>alert("Usted no tiene permiso suficiente");</script>'; }
  }

  function Modificar($data = array()){
    $QueryPermisos = $this->con->query("SELECT `permiso`
                                        FROM `iwama-ryu-art-usuarios`
                                        WHERE `permiso` = '".$_SESSION['permiso']."' ")->fetch();
    $Permisos = $QueryPermisos['0'];
    if ($Permisos == "administrador") {

      if (!empty($data['id_mod']) && (!empty($data['nombre_usuario_mod']))) {
        $sql = "UPDATE `iwama-ryu-art-usuarios` SET " ;

        if (!empty($data['nombre_usuario_mod'])) {
          $sql .= " nombre= '".$data['nombre_usuario_mod']."' ";
        }

        if (!empty($data['email_usuario_mod'])) {
          $sql .= ", email='".$data['email_usuario_mod']."' ";
        }
        if (!empty($data['password_usuario_mod'])) {
          $sql .= ", password='".$data['password_usuario_mod']."' ";
        }
        if (!empty($data['permiso_usuario_mod'])) {
          $sql .= ", permiso='".$data['permiso_usuario_mod']."' ";
        }

        $sql .= " WHERE id=" .$data['id_mod'];
        $modificado = $this->con->exec($sql);
        if ($modificado == false) {
          echo "<script>alert(Problemas al modificar usuarios, por favor vuelva a intentarlo);</script>";
        }
      }
    } else { echo '<script>alert("Usted no tiene permiso suficiente");</script>'; }
  }
}
?>
