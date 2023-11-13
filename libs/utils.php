<?php

function cabecera(string $titulo = NULL, string $archivo_css = NULL): string
{
    $titulo = (is_null($titulo))
        ? basename(__FILE__)
        : $titulo;
    $cabecera_css = (is_null($archivo_css))
        ? ''
        : '<link rel="stylesheet" type="text/css" href="' . $archivo_css . '">';

    $cabecera = '
            <!DOCTYPE html>
            <html lang="es">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    ' . $cabecera_css . '
                    <title>' . $titulo . '</title>
                </head>
                <body>
        ';
    return $cabecera;
}




function pie(): string
{
    return '        
                    <p><a href="./">Volver atrás</a></p>
                </body>
            </html>
        ';
}


function sinTildes($frase)
{
    $no_permitidas = array(
        "á",
        "é",
        "í",
        "ó",
        "ú",
        "Á",
        "É",
        "Í",
        "Ó",
        "Ú",
        "à",
        "è",
        "ì",
        "ò",
        "ù",
        "À",
        "È",
        "Ì",
        "Ò",
        "Ù"
    );
    $permitidas = array(
        "a",
        "e",
        "i",
        "o",
        "u",
        "A",
        "E",
        "I",
        "O",
        "U",
        "a",
        "e",
        "i",
        "o",
        "u",
        "A",
        "E",
        "I",
        "O",
        "U"
    );
    $texto = str_replace($no_permitidas, $permitidas, $frase);
    return $texto;
}


function sinEspacios(string $cadena): string
{
    $texto = trim(preg_replace('/ +/', " ", $cadena));
    return $texto;
}


function compCaseEsp(string $cadena1, string $cadena2): int
{
    $newCadena1 = sinTildes(sinEspacios($cadena1));
    $newCadena2 = sinTildes(sinEspacios($cadena2));

    return strcasecmp($newCadena1, $newCadena2);
}


function recoge(string $var): string
{
    if (isset($_REQUEST[$var]) && (!is_array($_REQUEST[$var]))) {
        $tmp = sinEspacios($_REQUEST[$var]);
        $tmp = strip_tags($tmp);
    } else
        $tmp = "";

    return $tmp;
}


function recogeArray(string $var): array
{
    $array = [];
    if (isset($_REQUEST[$var]) && (is_array($_REQUEST[$var]))) {
        foreach ($_REQUEST[$var] as $valor)
            $array[] = strip_tags(sinEspacios($valor));
    }

    return $array;
}



function cTexto(string $text, string $campo, array &$errores, int $max = 30, int $min = 1, bool $espacios = TRUE, bool $case = TRUE)
{
    $case = ($case === TRUE) ? "i" : "";
    $espacios = ($espacios === TRUE) ? " " : "";
    if ((preg_match("/^[a-zñ$espacios]{" . $min . "," . $max . "}$/u$case", sinTildes($text)))) {
        return true;
    }
    $errores[$campo] = "Error en el campo $campo";
    return false;
}

function cPassword (string $string, string $campo, array &$errores) {
    if($string =="" || strlen($string) < 4 || preg_match("/;/",$string) == true)  {
        $errores[$campo] = "Error en el campo $campo";
        return false;
    } else return true;
}

function cEmail(string $text, string $campo, array &$errores)
{
    if ((preg_match("/^[a-z0-9.]+@([a-z]+\.)+[a-z]{2,4}$/i", sinTildes($text)))) {
        return true;
    } else {
        $errores[$campo] = "Error en el campo $campo";
        return false;
    }
    
}

function cFecha(string $date, string $campo, array &$errores)
{   if(!$date == "") {
    list($d,$m,$y) = explode("-", $date);
    if(checkdate($m,$d,$y)) {
        return true;
    }
    }
    
    
    $errores[$campo] = "Error en el campo $campo";
    return false;
}


function cNum(string $num, string $campo, array &$errores, bool $requerido = TRUE, int $max = PHP_INT_MAX)
{
    $cuantificador = ($requerido) ? "+" : "*";
    if ((preg_match("/^[0-9]" . $cuantificador . "$/", $num)) && ($num <= $max)) {

        return true;
    }
    $errores[$campo] = "Error en el campo $campo";
    return false;
}

function cPrecio(string $num, string $campo, array &$errores, bool $requerido = TRUE, int $max = PHP_INT_MAX)
{
    $cuantificador = ($requerido) ? "+" : "*";
    if ((preg_match("/^[0-9\,\.]" . $cuantificador . "$/", $num)) && ($num <= $max)) {

        return true;
    }
    $errores[$campo] = "Error en el campo $campo";
    return false;
}


function cRadio(string $text, string $campo, array &$errores, array $valores, bool $requerido = TRUE)
{
    if (!$requerido && $text == "") {
        return true;
    }
    if (in_array($text, $valores)) {
        return true;
    }

    $errores[$campo] = "Error en el campo $campo";
    return false;
}


function cCheck(array $arr, string $campo, array &$errores, array $valores, bool $requerido = TRUE)
{

    if (($requerido) && (count($arr) == 0)) {
        $errores[$campo] = "Error en el campo $campo";
        return false;
    }
    foreach ($arr as $valor) {
        if (!in_array($valor, $valores)) {
            $errores[$campo] = "Error en el campo $campo, no existe el valor: $valor";
            return false;
        }
    }
    return true;
}


function cFile(string $nombre, array &$errores, array $extensionesValidas, string $directorio, int  $max_file_size,  bool $required = TRUE)
{
    // Caso especial que el campo de file no es requerido y no se intenta subir ningun archivo
    if ((!$required) && $_FILES[$nombre]['error'] === 4)
        return true;
    // En cualquier otro caso se comprueban los errores del servidor 
    if ($_FILES[$nombre]['error'] != 0) {
        $errores[$nombre] = "Error al subir el archivo " . $nombre . ". Prueba de nuevo";
        return false;
    } else {

        //Guardamos nombre del fichero en el servidor
        $nombreArchivo = strip_tags($_FILES[$nombre]['name']);

        //Guardamos directorio temporal donde se guarda el fichero
        $directorioTemp = $_FILES[$nombre]['tmp_name'];

        //Calculamos el tamaño del fichero
        $tamanyoFile = filesize($directorioTemp);

        //Extraemos la extensión del fichero, desde el último punto. Si hubiese doble extensión, no la tendría en cuenta.
        $extension = strtolower(pathinfo($nombreArchivo, PATHINFO_EXTENSION));

        //Comprobamos la extensión del archivo dentro de la lista que hemos definido al principio
        if (!in_array($extension, $extensionesValidas)) {
            $errores[$nombre] = "La extensión del archivo no es válida";
            return false;
        }
        //Comprobamos el tamaño del archivo
        if ($tamanyoFile > $max_file_size) {
            $errores[$nombre] = "La imagen debe de tener un tamaño inferior a $max_file_size kb";
            return false;
        }

        // Almacenamos el archivo en ubicación definitiva si no hay errores ( al compartir array de errores TODOS LOS ARCHIVOS tienen que poder procesarse para que sea exitoso. Si cualquiera da error, NINGUNO  se procesa)

        if (empty($errores)) {
            //Comprobamos si el directorio pasado es válido
            if (is_dir($directorio)) {
                /*
                 Tenemos que buscar un nombre único para guardar el fichero de manera definitiva.
                 Podemos hacerlo de diferentes maneras, en este caso se hace añadiendo microtime() al nombre del fichero si ya existe un archivo guardado con ese nombre.
                 */
                $nombreArchivo = is_file($directorio . DIRECTORY_SEPARATOR . $nombreArchivo) ? time() . $nombreArchivo : $nombreArchivo;
                $nombreCompleto = $directorio . DIRECTORY_SEPARATOR . $nombreArchivo;
                //Movemos el fichero a la ubicación definitiva.
                if (move_uploaded_file($directorioTemp, $nombreCompleto)) {
                    //Si todo es correcto devuelve la ruta y nombre del fichero como se ha guardado
                    return $nombreCompleto;
                } else {
                    $errores[$nombre] = "Ha habido un error en la subida del fichero";
                    return false;
                }
            } else {
                $errores[$nombre] = "Ha habido un error al subir el fichero";
                return false;
            }
        } else {
            return false;
        }
    }
}

?>

