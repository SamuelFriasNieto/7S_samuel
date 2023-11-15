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


echo cabecera("GGLock","../../public/css/userPage.css" );
?>

<main>
    
    <div class="overlay">
        <header>
            <h1><strong>GG</strong>Lock</h1>
            <p>Nos alegra verte <?php echo $_SESSION["sNombre"]; ?> </p>
            <nav>
                <a href="#">Mi Perfil</a>
                <a href="../../index.php">Cerrar Sesión</a>
            </nav>
            <img src="<?= $_SESSION["sFoto"] ?>" alt="">
        </header>
        <div class="contenedor_principal">
            <section class="vender">
                <h2>Vender Juegos</h2>
                <p>¿No lo usas? Vendelo y que alguien más disfrute de tus juegos</p>
                <a href="../formProcessors/sell.php"></a>
            </section>
            <section class="comprar">
                <h2>Comprar Juegos</h2>
                <p>Encuentra tus videojuegos favoritos al mejor <br> precio</p>
                <a href="../views/sales.php"></a>
            </section>
        </div>
        
    </div>
    <div class="bg_image"></div>
    
    
</main>
<footer class="pie">
    <p>Todos los derechos reservados</p>
    <p><a href="https://github.com/SamuelFriasNieto/7S_samuel" target="_blank">Github : SamuelFriasNieto</a></p>
</footer>

<?php echo pie() ?>
    
    








