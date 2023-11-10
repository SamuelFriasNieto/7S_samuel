<?php
require ("../../libs/utils.php");
echo cabecera("register","../../public/css/register.css");

$errores = [];
$idiomasValidos = ["Castellano","Ingles","Catalan"];
$nombre = "";
$correo = "";
$fecha = "";
$idioma = "";

if(!isset($_REQUEST["enviar"])) {
    require("../views/formRegister.php");
} else {
    $nombre = recoge("nombre");
    $correo = recoge("correo");
    $fecha = recoge("fecha");
    $idioma = recoge("idioma");

    cTexto($nombre,"nombre", $errores, 40);
    cEmail($correo,"correo",$errores);
    cFecha($fecha,"fecha",$errores);
    cRadio($idioma,"idioma",$errores,$idiomasValidos);

    if(!empty($errores)) {
        require("../views/formRegister.php");
    } else {
        header("location:../views/userPage.php");
    }
    

}

?>


<?php echo pie(); ?>

