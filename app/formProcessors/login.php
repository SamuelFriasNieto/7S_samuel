<?php
require ("../../libs/utils.php");
echo cabecera("register","../../public/css/login.css");

$errores = [];
$correo = "";
$password = "";

if(!isset($_REQUEST["enviar"])) {
    require("../views/formLogin.php");
} else {
    $correo = recoge("correo");
    $password = recoge("password");


    cEmail($correo,"correo",$errores);
    cPassword($password,"password",$errores);

    if(!empty($errores)) {
        require("../views/formLogin.php");
    } else {
        header("location:../views/userPage.php");
    }
    

}

?>
<img src="" alt="">
<?php echo pie(); ?>

