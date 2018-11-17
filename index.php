<?php
/*if (isset($_SESSION['ultima_atividade']) && (time() - $_SESSION['ultima_atividade'] > 30)) {

    // última atividade foi mais de 60 minutos atrás
    session_unset();     // unset $_SESSION  
    session_destroy();   // destroindo session data 
}*/
session_start();
//$_SESSION['ultima_atividade'] = time(); 
require 'config.php';

/*
 * Verificar 3 pastas para achar as classes a serem instanciadas
**/
spl_autoload_register(function($class){

    require_once 'dompdf/autoload.inc.php';

    if(file_exists("controllers/".$class.".php")){
        require "controllers/".$class.".php";
    }else if(file_exists("models/".$class.".php")){
        require "models/".$class.".php";
    }else if(file_exists("core/".$class.".php")){
        require "core/".$class.".php";
    }

});

$verificarLogin = new Login();
$core = new Core();
if($_GET['url'] != 'login'){
    $verificarLogin->verificarLogin();
}
$core->run();
?>