<?php
//CLASSE PARA INSTANCIAR A CONEXAO COM BANCO DE DADOS;
class Model{

    protected $db;

    public function __construct(){
        global $db;
        $this->db = $db;
    }

}

?>