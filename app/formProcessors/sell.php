<?php 
session_start();
include("../../libs/utils.php");
$inactividad = 600;
if(isset($_SESSION["timeout"])) {
    $vidaSesion = time() - $_SESSION["timeout"];
}
if($vidaSesion > $inactividad) {
    session_unset();
    session_destroy();
} else {
    $_SESSION["timeout"] = time();
}
echo cabecera("GGLock","../../public/css/sell.css");

$errores = [];
/*
    $dir$, catValidas = ["rpg","aaa","metroidvania","hackslash","arcade","roguelike"], $estadosValidos = ["nuevo","usado","arreglar"], 
$extensionesValidas = ["jpeg","jpg","png"] y $tamanyoMaximo = 3000000; mejor en config.php
*/
$dir = "../formProcessors/userImg";
$juego = "";
$ubi = "";
$precio = "";
$desc = "";
$cat = "";
$catValidas = ["rpg","aaa","metroidvania","hackslash","arcade","roguelike"];
$estado = "";
$estadosValidos = ["nuevo","usado","arreglar"];
$extensionesValidas = ["jpeg","jpg","png"];
$tamanyoMaximo = 3000000;

if($_SESSION["acceso"] != 1) {
    header("location:../../index.php");
} else {
    if(!isset($_REQUEST["vender"])) {
        require("../views/formSell.php");
    } else {
        $juego = recoge("juego");
        $ubi = recoge("ubi");
        $precio = recoge("precio");
        $desc = recoge("desc");
        $cat = recoge("cat");
        $estado = recoge("estado");
    
        cTexto($juego,"juego",$errores,40);
        cTexto($ubi,"ubicación",$errores,70);
        cPrecio($precio,"precio",$errores,true);
        cTexto($desc,"descripción",$errores,300);
        cRadio($cat,"categoria",$errores,$catValidas);
        cRadio($estado,"estado",$errores,$estadosValidos);
    
        if(!empty($errores)) {
            require("../views/formSell.php");
        } else {
            $fotoJuego = cFile("fotoJuego",$errores,$extensionesValidas,$dir,$tamanyoMaximo,false);
            if(!empty($errores)) {
                require("../views/formSell.php");
            } else {
                /**
                ** Te faltan las comprobaciones antes de abrir y de escribir en rl fichero
                **/
                $services = fopen("./userFiles/services.txt","a+");
                fwrite($services,$juego.";".$ubi.";".$precio.";".$desc.";".$cat.";".$estado.";".$fotoJuego.PHP_EOL);
                header("location:../views/sellCheck.php");
            }
        }
    }
}


?>

<?php echo pie() ?>
