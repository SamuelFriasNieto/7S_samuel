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
/**
    ** El código de arriba puedes implementarlo en una función ya que lo tendrás que repetir en todas las páginas privadas.
    ** Una vez cerrada la ssesión puedes redirigir al usuario a index.php, por ejemplo
    **/
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
<!-- 
-- Cuando llegas aquí desde register.php no has almaenado la imagen en $_SESSION por eso no muestra la imagen
-- Cuando te logueas desde login si la guardas- 
-- En esta página tenías que mostrar los datos de los servicios que tienes guardados en el fichero de texto.
-->
            
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
    
    








