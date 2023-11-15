<?php
session_start();
include("../../libs/utils.php");
echo cabecera("GGLock","../../public/css/sellCheck.css");
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
?>


<main>
    
    <div class="overlay">
        <header>
            <h1><strong>GG</strong>Lock</h1>
            <nav>
                <a href="#">Mi Perfil</a>
                <a href="../../index.php">Cerrar Sesión</a>
                <img src="<?= $_SESSION["sFoto"] ?>" alt="">
            </nav>
        </header>
        <div class="contenedor_principal">
        <div class="register">
            <h2 class="correcto">El juego se ha subido correctamente</h2>
            <a href="userPage.php" class="volver">Volver al inicio</a>
        </div>
        </div>
        
    </div>
    <div class="bg_image"></div>
    
    
</main>
<footer class="pie">
    <p>Todos los derechos reservados</p>
    <p><a href="https://github.com/SamuelFriasNieto/7S_samuel" target="_blank">Github : SamuelFriasNieto</a></p>
</footer>

<?php pie() ?>








