<?php

class Usuario extends Model{

    private $usuario;

    public function getUsuario($id){
        $dados = array();

        $sql = $this->db->prepare("SELECT * FROM usuarios WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();

        if($sql->rowCount() > 0){
            $dados = $sql->fetch();
        }

        return $dados;
    }

}

?>