<?php 
require("../7S_samuel/libs/utils.php");
echo cabecera("Home","./index.css");
?>

<main>
    
    <section class="inicio">
            <p><strong>GG</strong>Lock</p>
            <section class="cuenta">
                <a href="">Registrarse</a>
                <a href="">Iniciar sesión</a>
            </section>
           
    </section>
    <section class="presentacion">
        <p>Consigue tus videojuegos favoritos <br> al mejor precio</p>
        <section class="juegos">
            <article>
                <img src="img/flat,750x,075,f-pad,750x1000,f8f8f8.jpg" alt="">
                <p>Baldurs Gate</p>
                <p class="precio">39,99€ <strong>-32%</strong></p>
            </article>
            <article>
                <img src="img/Poster_BOTW.jpg" alt="">
                <p>The Legend Of Zelda</p>
                <p class="precio">35,99€ <strong>-40%</strong></p>
            </article>
            <article>
                <img src="img/Poster_SF.webp" alt="">
                <p>Starfield</p>
                <p class="precio">49,99€ <strong>-30%</strong></p>
            </article>
            <article>
                <img src="img/Poster_ED.jpg" alt="">
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