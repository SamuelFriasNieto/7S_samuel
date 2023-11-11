<?php
require ("../../libs/utils.php");
echo cabecera("register","../../public/css/register.css");

$errores = [];
$dir = "../formProcessors/userImg";
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
            $userTXT = fopen("./userFiles/users.txt","r+");
            while(!feof($userTXT)) {
               $line = str_replace("\n", "", fgets($userTXT));
               if ($line != "") {
                $arrayLine = explode(";", $line);

                    if($arrayLine[1]==$correo) {
                    $errores["autenticación"] = "El correo introducido ya existe";
                    } 
                }
            }
            if(empty($errores)) {
                fwrite($userTXT,$nombre.";".$correo.";".$fecha.";".$password.";".$idioma.";".$file. PHP_EOL);
                header("location:../views/userPage.php");
            } else {
                require("../views/formRegister.php");
            }

           
        
        
    }
    
    }
}

?>
<img src="" alt="">
<?php echo pie(); ?>

