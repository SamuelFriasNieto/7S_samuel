<?php 
include("../../libs/utils.php");
echo cabecera("GGLock","../../public/css/sell.css");

$errores = [];
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
        $fotoJuego = cFile("fotoJuego",$errores,$extensionesValidas,$dir,$tamanyoMaximo);
        if(!empty($errores)) {
            require("../views/formSell.php");
        } else {
            $services = fopen("./userFiles/services.txt","a+");
            fwrite($services,$juego.";".$ubi.";".$precio.";".$desc.";".$cat.";".$estado.PHP_EOL);
            header("location:../views/sellCheck.php");
        }
    }
}
?>

<?php echo pie() ?>