<?php
session_start();
require ("../../libs/utils.php");
echo cabecera("register","../../public/css/register.css");

$errores = [];
$dir = "../formProcessors/userImg";

/*
**  $tamanyoMaximo = 300000;
**  $extensionesPerm = ["jpg","png","jpeg"];
**  $idiomasValidos = ["Castellano","Ingles","Catalan"];
** Mejor si guardas estas variables en una librería config.php dentro de libs. Así consigues centralizarlo
*/
    
$tamanyoMaximo = 300000;
$extensionesPerm = ["jpg","png","jpeg"];
$idiomasValidos = ["Castellano","Ingles","Catalan"];
$nombre = "";
$correo = "";
$fecha = "";
$idioma = "";
$password = "";

if($_SESSION["acceso"]==1) {
    header("location:../views/userPage.php");
} else {
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
        cRadio($idioma,"idioma",$errores,$idiomasValidos,false);
        cPassword($password,"password",$errores);
    
        
            
            if(!empty($errores)) {
                require("../views/formRegister.php");
            } else {
                /*
                *** Puedes hacer una función que devuelva true si el email existe. Hace que la aplicación sea más modular
                */
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
                    $file = cFile("archivo",$errores,$extensionesPerm,$dir,$tamanyoMaximo,false);
                    if(empty($errores)) {
                        fwrite($userTXT,$nombre.";".$correo.";".$fecha.";".$password.";".$idioma.";".$file. PHP_EOL);
                        $_SESSION["sNombre"] = $nombre; 
                        $_SESSION["sCorreo"] = $correo;
                        $_SESSION["acceso"] = 1; 
                        $_SESSION["timeout"] = time();
                        header("location:../views/userPage.php");
                    } else {
                        require("../views/formRegister.php");
                    }
                    
                } else {
                    require("../views/formRegister.php");
                }
    
               
            
            
        }
        
        
    }
    
}


?>
<?php echo pie(); ?>

