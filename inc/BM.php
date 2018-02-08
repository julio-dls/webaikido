<?php
class BM {
  private $con;

  function __construct($con) {
    $this->con=$con;
  }

  public function Eliminar($data = array()){

    $del = "DELETE FROM `imagenes` WHERE id =".$data['id']." ";
    $delImg=$this->con->exec($del);
    // if ($delImg) {
    //   $path = 'Web_Aikido/images/'.$data['id'];
    //   $carpeta = $_SERVER['DOCUMENT_ROOT'] . '/' .$path;;
    //   rmDir_rf($carpeta);
    //   echo "<script>alert('Archivo eliminado correctamente');</script>";
    // }
  }

  public function Modificar($data = array()){

    if (!empty($data['id']) && (!empty($data['nombre']))) {
      $sql = "UPDATE `imagenes` SET " ;

      if (!empty($data['nombre'])) {
        $sql .= " nombre= '".$data['nombre']."' ";
      }

      if (!empty($data['categoria'])) {
        $sql .= ", categoria='".$data['categoria']."' ";
      }

      $sql .= " WHERE id=" .$data['id'];
      // echo "sql: " .$sql;
      $this->con->exec($sql);
    }
  }
}
function rmDir_rf($carpeta) {
  foreach(glob($carpeta."/*") as $archivos_carpeta){
    if (is_dir($archivos_carpeta)){
      rmDir_rf($archivos_carpeta);
    } else {
    unlink($archivos_carpeta);
    }
  }
  rmdir($carpeta);
}

?>
