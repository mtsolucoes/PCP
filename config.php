<?php 
require 'environment.php';

$config = array();

if(ENVIRONMENT == 'development'){
    define("BASE_URL", "http://localhost/pcp/");//url local
    //conexão para banco local
    $config['dbname'] = "pcp_mtsolucoes";
    $config['host'] = "localhost";
    $config['dbuser'] = "root";
    $config['dbpass'] = "";
}else{
    define("BASE_URL", "http://pcpconnect.com.br/PCP");//url da hospoedagem
    //conexão para o banco da hospedagem
    $config['dbname'] = "pcp_mtsolucoes";
    $config['host'] = "31.220.48.193";
    $config['dbuser'] = "root";
    $config['dbpass'] = "teste";
}

global $db;
try{
    $db = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'], $config['dbuser'], $config['dbpass']);
}catch(PDOException $e){
    throw new PDOException($e);
}

?>