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
        $userTXT = fopen("./userFiles/users.txt","r+");
            while(!feof($userTXT)) {
               $line = str_replace("\n", "", fgets($userTXT));
               if ($line != "") {
                $arrayLine = explode(";", $line);

                    if($arrayLine[1]==$correo && $arrayLine[3]==$password) {
                        $inicio = true;
                        header("location:../views/userPage.php");
                    } 
                }
            }
            fclose($userTXT);
            if(!isset($inicio)) {
                $errores["login"] = "El correo y la contraseña no son correctos";
                $logLogin = fopen("./userFiles/logLogin.txt", "a+");
                fwrite($logLogin,$correo.";".$password.";".date("d-m-y",time()).PHP_EOL);
                require("../views/formLogin.php");
            }

        
    }
    

}

?>
<img src="" alt="">
<?php echo pie(); ?>

