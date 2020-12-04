<?php

session_start();

$path = '';
if (isset($_SESSION['path'])) {
    foreach ($_SESSION['path'] as $key) {
        $path = $path . '/' . $key;
    }
}
$path = './projectFolder' . $path . '/' . $_POST['fileID'];

if(isset($_GET['codigo_permiso'])){

    var_dump($_GET['codigo_permiso']);
    
    if(intval($_GET['codigo_permiso']) === 600 || intval($_GET['codigo_permiso']) === 644 || intval($_GET['codigo_permiso']) === 666 || 
    intval($_GET['codigo_permiso']) === 700 || intval($_GET['codigo_permiso']) === 711 || intval($_GET['codigo_permiso']) === 755 || 
    intval($_GET['codigo_permiso']) === 777){

        chmod($path,intval($_GET['codigo_permiso']));

        $_SESSION['success'] = "Los permisos se han modificado satisfactoriamente";
        header( "Location: index.php" );
        return;

    }else{

        if(intval($_GET['codigo_permiso']) == 0){
            $_SESSION['error'] = "Por favor ingrese un código";
            header( "Location: index.php" );
            return;
        }else{
            $_SESSION['error'] = "Por favor ingrese un código válido";
            header( "Location: index.php" );
            return;
        }
    }

}else{
    $_SESSION['error'] = "Por favor ingrese un código";
    header( "Location: index.php" );
    return;
}
?>