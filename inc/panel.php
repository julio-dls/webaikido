<?php

class panelABM {

  private $con;

  function __construct($con) {
    $this->con = $con;
  }

  public function Alta($data = array(),$fImg = array()) {

    if (!empty($data) and !empty($fImg)) {
      foreach ($fImg['ContenedorImg']['name'] as $posicion => $nombre) {
        $finlename = $fImg['ContenedorImg']['name'][$posicion];
        $nombres = basename($finlename, ".jpg");
        $nombres = str_replace('_',' ',$nombres);
        $nombres = str_replace('-',' ',$nombres);
        $nombres = ucwords($nombres);
        $nombres = utf8_encode($nombres);
      }
      $sql = "INSERT INTO `imagenes`(`nombre`, `categoria`) VALUES ('".$nombres."', '".$data['categoria']."' )";
      $transCorrect=$this->con->exec($sql);
    } else {
      $transCorrect = false;
    }
    if ($transCorrect) {
      $id_img = $this->con->query('SELECT max(`id`) as imagenes_id FROM `imagenes`')->fetch();

       if (is_array($fImg['ContenedorImg'])) {
         if(isset($fImg['ContenedorImg']['name'])){
           $id_imagenes = $id_img['imagenes_id'];

           foreach($fImg['ContenedorImg']['name'] as $posicion => $nombre){
             $ruta = 'images/'.$id_imagenes;
             @mkdir($ruta);

             $tamanhos = array('0'=>array('ancho'=>'300','alto'=>'360','nombre'=>'small'),
                               '1'=>array('ancho'=>'1100','alto'=>'1100','nombre'=>'big')
                             );

             redimensionar('images/'.$id_imagenes.'/',
                           $fImg['ContenedorImg']['name'][$posicion],
                           $fImg['ContenedorImg']['tmp_name'][$posicion],
                           $posicion,
                           $tamanhos
                         );
            echo "<script>alert('Imagen Cargada Correctamente');</script>";
           }

           if(!file_exists($ruta)){
               $ultimoId = $this->con->query('SELECT max(`id`) as imagenes_id FROM `imagenes`')->fetch();
               $idUltimo = $ultimoId['imagenes_id'];
               $sqlDelete = ("DELETE FROM `imagenes` WHERE id=".$idUltimo);
               $this->con->exec($sqlDelete);
               echo "<script>alert('No se creo la carpeta, por favor, vuelta a intentarlo ');</script>";
           }
         }
       }
    } else {
       echo "<script>alert('La Imagen Fue Ingresada Correctamente');</script>";
    }
  }

  public function AltaVideos($data = array()){
    $sql = "INSERT INTO `video` (`titulo`, `descripcion`, `url`) VALUES ('".$data['titulo']."', '".$data['descripcion']."', '".$data['url']."' )";
    $transCorrect=$this->con->exec($sql);

    if ($transCorrect) {
      echo "<script>alert('El Video Se Cargo Correctamente');</script>";
    } else {
      echo "<script>alert('Fallo el intento de cargar el video, intente nuevamente por favor!');</script>";
    }
  }
}

//redimencionar imagen
function redimensionar($ruta,$file_name,$file_temp,$id,$tamanhos){
  $filename = stripslashes($file_name);
  $extension = getExtension($filename);
  $extension = strtolower($extension);

  if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) {
    $errors=1;
  } else {
    $size=filesize($file_temp);
    if ($size > 3*1024){
      $change='<div class="msgdiv">You have exceeded the size limit!</div> ';
      $errors=1;
    }
    if($extension=="jpg" || $extension=="jpeg" ){
      $uploadedfile = $file_temp;
      $src = imagecreatefromjpeg($uploadedfile);
    }else if($extension=="png"){
      $uploadedfile = $file_temp;
      $src = imagecreatefrompng($uploadedfile);
      imagealphablending($src, true);
      imagesavealpha($src, true);
    }else{
      $src = imagecreatefromgif($uploadedfile);
    }
    //echo "".$src;
    list($width,$height)=getimagesize($uploadedfile);
    foreach($tamanhos as $tam){
      $newwidth = $tam['ancho'];
      $newheight=($height/$width)*$newwidth;
      if($newheight > $tam['alto']){
        $newheight = $tam['alto'];
        $newwidth=($width/$height)*$newheight;
        if($newwidth > $tam['ancho']){
          $height = $newheight;
          $width = $newwidth;
          $newheight=($height/$width)*$newwidth;
        }
      }
      $tmp=imagecreatetruecolor($newwidth,$newheight);
      if($extension == "png"){
        $rojo = imagecolorallocate($tmp, 234, 234, 234);
        imagefill($tmp, 0, 0, $rojo);
      }
      imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);

      $filename = $ruta.'img_'.$id.'_'.$tam['nombre'].'.'.$extension;
      if($extension == "png"){
        $negro = imagecolorallocate($tmp, 234, 234, 234);
        imagecolortransparent($tmp,$negro);
        imagepng($tmp,$filename,9);
      }elseif($extension == 'gif'){
        imagegif($tmp,$filename,100);
      }else{
        imagejpeg($tmp,$filename,100);
      }
      imagedestroy($tmp);
    }
    imagedestroy($src);
  }
}
//funcion para obtener la extension
 function getExtension($str) {
         $i = strrpos($str,".");
         if (!$i) { return ""; }
         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
 }
?>
