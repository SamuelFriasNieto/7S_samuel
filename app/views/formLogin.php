

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
                <caption>Inicia sesión en <span><strong>GG</strong>Lock</span></caption>
                </div>
                <div>
                    <label for="correo">E-mail</label>
                    <br>
                    <input type="text" name="correo" value="<?= isset($correo)? $correo : ""; ?>" placeholder="Introduce tu E-mail">
                </div>
                <div>
                <label for="contraseña">Contraseña</label>
                    <br>
                    <input type="text" name="password" value="<?= isset($password)? $password : ""; ?>" placeholder="Introduce tu contraseña">
                </div>
                <input class="enviar" type="submit" value="Crear Perfil" name="enviar">

            </form>
        </div>
    </div>
    <div class="bg_image"></div>
    
    
</main>
<footer class="pie">
    <p>Todos los derechos reservados</p>
    <p><a href="https://github.com/SamuelFriasNieto/7S_samuel" target="_blank">Github : SamuelFriasNieto</a></p>
</footer>
    
    








