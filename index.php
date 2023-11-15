<?php 
require("../7S_samuel/libs/utils.php");
session_start();
/*
** Si haces session_unset y session_destroy destruyes la sesión que has creado.
** En todo caso mejor redirigir si el usuario ya está logueado
*/
session_unset();
session_destroy();
echo cabecera("Home","./index.css");
?>

<main>
    
    <section class="inicio">
            <p><strong>GG</strong>Lock</p>
            <section class="cuenta">
                <a href="app/formProcessors/register.php">Registrarse</a>
                <a href="app/formProcessors/login.php">Iniciar sesión</a>
            </section>
           
    </section>
    
    <!--Tienes que mostrar los servicios dinámicamente
    --- En esta ase del ejercicio tenías que mostrar los títulos de los servicios que tienes almacenados en el fichero
    -->
    
    <section class="presentacion">
        <p>Vende y compra tus videojuegos favoritos <br> al mejor precio</p>
        <section class="juegos">
            <article>
                <img src="public/img/flat,750x,075,f-pad,750x1000,f8f8f8.jpg" alt="">
                <p>Baldurs Gate</p>
                <p class="precio">39,99€ <strong>-32%</strong></p>
            </article>
            <article>
                <img src="public/img/Poster_BOTW.jpg" alt="">
                <p>The Legend Of Zelda</p>
                <p class="precio">35,99€ <strong>-40%</strong></p>
            </article>
            <article>
                <img src="public/img/Poster_SF.webp" alt="">
                <p>Starfield</p>
                <p class="precio">49,99€ <strong>-30%</strong></p>
            </article>
            <article>
                <img src="public/img/Poster_ED.jpg" alt="">
                <p>Elden Ring</p>
                <p class="precio">47,99€ <strong>-20%</strong></p>
            </article>
        </section>
       
    </section>
    <div class="overlay"></div>
    <div class="bg_image"></div>
    
    
</main>
<footer class="pie">
    <p>Todos los derechos reservados</p>
    <p><a href="https://github.com/SamuelFriasNieto/7S_samuel" target="_blank">Github : SamuelFriasNieto</a></p>
</footer>
    
    









<?php  echo pie() ?>
