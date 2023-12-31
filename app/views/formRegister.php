

<main>
    
    <div class="overlay">
        <div class="register">
            <form action="" method="post" enctype="multipart/form-data">
                <?php  
                    foreach($errores as $error) {
                        echo "<p>$error</p>";
                    }
                ?>
                <div class="cap">
                <caption>Date de alta en <a href="../../index.php"><span><strong>GG</strong>Lock</span></a></caption>
                </div>
                <div>
                    <label for="nombre">Nombre</label>
                    <br>
                    <input type="text" name="nombre" value="<?= isset($nombre)? $nombre : ""; ?>" placeholder="Introduce tu nombre">
                </div>
                    <div>
                    <label for="correo">E-mail</label>
                    <br>
                    <input type="text" name="correo" value="<?= isset($correo)? $correo : ""; ?>" placeholder="Introduce tu E-mail">
                </div>
                <div>
                    <label for="fecha">Fecha de nacimiento</label>
                    <br>
                    <input type="text" name="fecha" value="<?= isset($fecha)? $fecha : ""; ?>" placeholder="D-M-A">
                </div>
                <div>
                <label for="contraseña">Contraseña</label>
                    <br>
                    <input type="text" name="password" value="<?= isset($password)? $password : ""; ?>" placeholder="Introduce una contraseña">
                </div>
                <div class="idioma">
                    <label for="idioma">Idioma</label>
                    <div class="opciones_idioma">
                        <input type="radio" name="idioma" value="Castellano"> Castellano
                        <input type="radio" name="idioma" value="Ingles"> Inglés
                        <input type="radio" name="idioma" value="Catalan"> Catalan
                    </div>
                </div>
                <div>
                    <label for="foto">Foto de perfil</label>
                    <br>
                    <input type="file" name="archivo" id="archivo">
                </div>
                <input class="enviar" type="submit" value="Crear Perfil" name="enviar">

            </form>
        </div>
        <p class="login"><a href="../formProcessors/login.php">¿Ya tienes una cuenta? Inicia sesión</a></p>
    </div>
    <div class="bg_image"></div>
    
    
</main>
<footer class="pie">
    <p>Todos los derechos reservados</p>
    <p><a href="https://github.com/SamuelFriasNieto/7S_samuel" target="_blank">Github : SamuelFriasNieto</a></p>
</footer>
    
    








