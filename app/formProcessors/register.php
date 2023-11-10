<?php
require ("../../libs/utils.php");
echo cabecera("register","../../public/css/register.css");

$errores = [];
$dir = "../formProcessors";
$tamanyoMaximo = 300000;
$extensionesPerm = ["jpg","png","jpeg"];
$idiomasValidos = ["Castellano","Ingles","Catalan"];
$nombre = "";
$correo = "";
$fecha = "";
$idioma = "";
$password = "";

if(!isset($_REQUEST["enviar"])) {
    require("../views/formRegister.php");
} else {
    $nombre = recoge("nombre");
    $correo = recoge("correo");
    $fecha = recoge("fecha");
    $idioma = recoge("idioma");
    $password = recoge("password");

    cTexto($nombre,"nombre", $errores, 40);
    cEmail($correo,"correo",$errores);
    cFecha($fecha,"fecha",$errores);
    cRadio($idioma,"idioma",$errores,$idiomasValidos);
    cPassword($password,"password",$errores);

    if(!empty($errores)) {
        require("../views/formRegister.php");
    } else {
        $file = cFile("archivo",$errores,$extensionesPerm,$dir,$tamanyoMaximo);
        if(!empty($errores)) {
            require("../views/formRegister.php");
        } else {
            header("location:../views/userPage.php");
        }
        
    }
    

}

?>
<img src="" alt="">
<?php echo pie(); ?>

