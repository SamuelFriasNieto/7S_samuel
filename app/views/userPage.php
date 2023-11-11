<?php
require("../../libs/utils.php");
echo cabecera("GGLock","../../public/css/userPage.css" );
?>

<main>
    
    <div class="overlay">
        <header>
            <h1><strong>GG</strong>Lock</h1>
            <nav>
                <a href="#">Mi Perfil</a>
                <a href="../../index.php">Cerrar Sesión</a>
            </nav>
        </header>
        <div class="contenedor_principal">
            <section class="vender">
                <h2>Vender Juegos</h2>
                <p>¿No lo usas? Vendelo y que alguien más disfrute de tus juegos</p>
            </section>
            <section class="comprar">
                <h2>Comprar Juegos</h2>
                <p>Encuentra tus videojuegos favoritos al mejor <br> precio</p>
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
    
    








