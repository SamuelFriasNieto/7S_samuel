<?php
session_start();
require("../../libs/utils.php");
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
if($_SESSION["acceso"] != 1) {
    header("location:../../index.php");
} 


echo cabecera("GGLock","../../public/css/sales.css");
?>

<main>
    
    <div class="overlay">
        <header>
            <h1><strong>GG</strong>Lock</h1>
            <p>Nos alegra verte <?php echo $_SESSION["sNombre"]; ?> </p>
            <nav>
                <a href="#">Mi Perfil</a>
                <a href="../../index.php">Cerrar Sesión</a>
                <img src="<?= $_SESSION["sFoto"] ?>" alt="">
            </nav>
        </header>
        <div class="contenedor_principal">
            <?php 
                $file = fopen("../formProcessors/userFiles/services.txt","r");
                while(!feof($file)) {
                    $line = fgets($file);
                    $arrayLine = explode(";",$line);
                    $nombre = $arrayLine[0];
                    $img = $arrayLine[6];
                    $cat = $arrayLine[4];
                    $estado = $arrayLine[5];
                    $precio = $arrayLine[2];
                    $ubi = $arrayLine[1];
                    if(empty($line)) {
                        echo "";
                    } else {
                        echo "<section class='register'>
                        <img src='$img' alt='foto del juego'>
                        <div>
                        <p>Nombre: $nombre</p>
                        <p>Precio: $precio</p>
                        <p>Categoria: $cat</p>
                        <p>Estado: $estado</p>
                        <p>Ubicación: $ubi</p>
                        </div>
                        </section>";
                    }
                   
                }
            ?>
            
            
        </div>
        
    </div>
    <div class="bg_image"></div>
    
    
</main>
<footer class="pie">
    <p>Todos los derechos reservados</p>
    <p><a href="https://github.com/SamuelFriasNieto/7S_samuel" target="_blank">Github : SamuelFriasNieto</a></p>
</footer>

<?php echo pie() ?>
    
    








