<?php

class Producao extends Model{

    //LISTAR PRODUÇÃO DO CONTROLE 
    public function listarProducao($idControle){
        $sql = $this->db->prepare("SELECT * FROM producao WHERE idControle = :idControle");
        $sql->bindValue(":idControle", $idControle);
        try{
            $sql->execute();
            if($sql->rowCount() > 0){
                $dados = $sql->fetchAll();
                return $dados;
            }
        }catch(PDOException $e){
            throw new PDOException($e);
        }
    }

    //SALVAR PRODUÇÃO NO CONTROLE
    public function salvarProducao($produto, $codigo, $quantidade, $idControle){
        $sql = $this->db->prepare("INSERT INTO producao SET produto = :produto, codigo = :codigo, quantidade = :quantidade, idControle = :idControle");
        $sql->bindValue(":produto", $produto);
        $sql->bindValue(":codigo", $codigo);
        $sql->bindValue(":quantidade", $quantidade);
        $sql->bindValue(":idControle", $idControle);

        try{
            $sql->execute();
        }catch(PDOException $e){
            throw new PDOException($e);
        }
    }

    //APGAR PRODUÇÃO DO CONTROLE
    public function apagarProducao($id){
        $sql = $this->db->prepare("DELETE FROM producao WHERE id = :id");
        $sql->bindValue(":id", $id);

        try{
            $sql->execute();
        }catch(PDOException $e){
            throw new PDOException($e);
        }
    }

}

?>