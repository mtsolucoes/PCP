<?php

class Controle extends Model{

    //SALVAR CONTROLES DE PRODUÇÃO
    public function salvarControle($data, $turno = "", $descricao = "", $idUsuario){
        $sql = $this->db->prepare("INSERT INTO controle SET data = :data, turno = :turno, descricao = :descricao, idUsuario = :idUsuario");
        $sql->bindValue(":data", $data);
        $sql->bindValue(":turno", $turno);
        $sql->bindValue(":descricao", $descricao);
        $sql->bindValue(":idUsuario", $idUsuario);

        try{
            $sql->execute();
            header("Location:".BASE_URL."controle/list");
        }catch(PDOEstatment $e){
            throw new PDOException($e);
        }

    }

    //LISTAR CONTROLES DE PRODUÇÃO
    public function listarControles($id){
        $sql = $this->db->prepare("SELECT * FROM controle WHERE idUsuario = :idUsuario");
        $sql->bindValue(":idUsuario", $id);

        try{
            $sql->execute();
            if($sql->rowCount() > 0){
                $dados = $sql->fetchAll();
                return $dados;
            }
        }catch(PDOEstatment $e){
            throw new PDOException($e);
        }
    }

    //LISTAR CONTROLES POR ID
    public function listarControlesPorId($id){
        $sql = $this->db->prepare("SELECT * FROM controle WHERE id = :id");
        $sql->bindValue(":id", $id);

        try{
            $sql->execute();
            if($sql->rowCount() == 1){
                $dados = $sql->fetch();
                return $dados;
            }
        }catch(PDOException $e){
            throw new PDOException($e);
        }
    }

    //PESQUISAR CONTROLE POR DATA
    public function pesquisarControle($data){
        $sql = $this->db->prepare("SELECT * FROM controle WHERE data = :data");
        $sql->bindValue(":data", $data);

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

    //DELETAR CONTROLE DE PRODUÇÃO
    public function deleteControle($id){
        $sql = $this->db->prepare("DELETE FROM controle WHERE id = :id");
        $sql->bindValue(":id",$id);
        
        try{
            $sql->execute();
        }catch(PDOException $e){
            throw new PDOException($e);
        }
    }

    public function lastInsert($idUsuario){
        $sql = $this->db->prepare("SELECT MAX(id) FROM controle WHERE idUsuario = :idUsuario");
        $sql->bindValue(":idUsuario", $idUsuario);

        try{
            $sql->execute();
            if($sql->rowCount() == 1 ){
                $data = $sql->fetch();
                return $data;
            }
        }catch(PDOException $e){
            throw new PDOException($e);
        }
    }
    
}

?>