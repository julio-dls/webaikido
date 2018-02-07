<?php
class BM {
  private $con;

  function __construct($con) {
    $this->con=$con;
  }

  public function Eliminar($data = array()){

    $del = "DELETE FROM `imagenes` WHERE id = '".$data['id']."' ";
    $delImg=$this->con->exec($del);
    // if ($delImg) {
    //   $path = 'Web_Aikido/images/'.$data['id'];
    //   $carpeta = $_SERVER['DOCUMENT_ROOT'] . '/' .$path;;
    //   rmDir_rf($carpeta);
    //   echo "<script>alert('Archivo eliminado correctamente');</script>";
    // }
  }

  public function Modificar($data = array()){
    if (!empty($data['id']) and !empty($data['nombre'])) {
      $sql = "UPDATE productos SET" ;
      if (!empty($data['nombre'])) {
        $sql .= " nombre= '".$data['nombre']."' ";
      }
      if (!empty($data['descripcion'])) {
        $sql .= ", descripcion='".$data['descripcion']."' ";
      }
      if (!empty($data['nombreIngles'])) {
        $sql .= ", `nombre-ingles`='".$data['nombreIngles']."' ";
      }
      if (!empty($data['descripcionIngles'])) {
        $sql .= ", `descripcion-ingles`='".$data['descripcionIngles']."' ";
      }
      if (!empty($data['categoria']) or !empty($data['estacion']) or !empty($data['accesorio'])) {
        if (!empty($data['categoria']) and !empty($data['estacion'])) {
          $sql .= ", categoria='".$data['categoria']."' ";
          $sql .= ", estacion='".$data['estacion']."' ";
          $sql .= ", accesorios=0 ";
        }
        if (!empty($data['accesorio'])) {
          $sql .= ", accesorios='".$data['accesorio']."' ";
          $sql .= ", categoria=0 ";
          $sql .= ", estacion=0 ";
        }
      }
      $sql .= " WHERE producto_id=" .$data['id'];
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
