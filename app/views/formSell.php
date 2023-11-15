

<main>
    
    <div class="overlay">
        <header>
            <h1><a href="../views/userPage.php"><strong>GG</strong>Lock</a></h1>
            <p>Nos alegra verte <?php echo $_SESSION["sNombre"]; ?> </p>
            <nav>
                <a href="#">Mi Perfil</a>
                <a href="../../index.php">Cerrar Sesión</a>
                <img src="<?= $_SESSION["sFoto"] ?>" alt="">
            </nav>
        </header>
        <div class="errores">
        <?php  
                    foreach($errores as $error) {
                        echo "<p>$error</p>";
                    }
                ?>
        </div>
        <div class="contenedor_principal">
        <div class="register">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="cap">
                <caption>Vende un juego en <span><strong>GG</strong>Lock</span></caption>
                </div>
                <section class="input_text">
                    <div>
                        <label for="juego">Nombre del juego</label>
                        <br>
                        <input type="text" name="juego" value="<?= isset($juego)? $juego : ""; ?>" placeholder="Nombre del juego">
                    </div>
                        
                    <div>
                        <label for="ubi">Ubicación de venta</label>
                        <br>
                        <input type="text" name="ubi" value="<?= isset($ubi)? $ubi : ""; ?>" placeholder="Introduce tu ubicación">
                    </div>
                    <div>
                        <label for="fecha">Precio</label>
                        <br>
                        <input type="text" name="precio" value="<?= isset($precio)? $precio : ""; ?>" placeholder="Precio del juego">
                    </div>
                </section>
                <hr>
                <div class="radio">
                    <label for="cat">Categoria del juego</label>
                        <div class="opciones_categoria">
                        <div><input type="radio" name="cat" value="rpg"> RPG</div>
                        <div><input type="radio" name="cat" value="aaa"> Triple A</div>
                        <div><input type="radio" name="cat" value="metroidvania"> Metroidvania</div>
                        <div><input type="radio" name="cat" value="hackslash"> Hack and Slash</div>
                        <div><input type="radio" name="cat" value="arcade"> Arcade</div>
                        <div><input type="radio" name="cat" value="roguelike"> RogueLike</div>
                    </div>
                </div>
                <hr>
                <div class="radio">
                    <label for="idioma">Estado del juego</label>
                    <div class="opciones_estado">
                        <input type="radio" name="estado" value="nuevo"> Nuevo
                        <input type="radio" name="estado" value="usado"> En buenas condiciones
                        <input type="radio" name="estado" value="arreglar"> Lo ha dado todo
                    </div>
                </div>
                <hr>
                <div class="descripcion">
                    <label for="desc">Descripción del juego</label>
                    <br>
                    <input type="textarea" name="desc" value="<?= isset($desc)? $desc : ""; ?>" placeholder="Introduce una breve descripcion del juego">
                </div>
                <hr>
                <div class="foto_juego">
                    <label for="fotoJuego">Foto del juego</label>
                    <br>
                    <input type="file" name="fotoJuego" id="fotoJuego">
                </div>
                <input class="enviar" type="submit" value="Vender Juego" name="vender">

            </form>
        </div>
        </div>
        
    </div>
    <div class="bg_image"></div>
    
    
</main>
<footer class="pie">
    <p>Todos los derechos reservados</p>
    <p><a href="https://github.com/SamuelFriasNieto/7S_samuel" target="_blank">Github : SamuelFriasNieto</a></p>
</footer>

    
    








