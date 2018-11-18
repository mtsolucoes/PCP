<?php

class Composicao extends Model{

    //LISTAR PRODUTOS COMPOSTOS
    public function listarComposicoes(){
        $sql = $this->db->prepare("SELECT * FROM compostos WHERE idUsuarioC = :id");
        $sql->bindValue(":id", $_SESSION['lguser']);

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

    //SALVAR PRODUTO COMPOSTO
    public function salvarComposicoes($nome, $codigo, $idUsuario, $precoProducao, $markup, $date){
        $sql = $this->db->prepare("INSERT INTO compostos SET nome = :nome, codigo = :codigo, idUsuarioC = :idUsuarioC, precoProducao = :precoProducao, markup = :markup, dataAtivo = :dataAtivo");
        $sql->bindValue(":nome", $nome);
        $sql->bindValue(":codigo", $codigo);
        $sql->bindValue(":idUsuarioC", $idUsuario);
        $sql->bindValue(":precoProducao", $precoProducao);
        $sql->bindValue(":markup", $markup);
        $sql->bindValue(":dataAtivo", $date);
        try{
            $sql->execute();
            header("Location:".BASE_URL."composicao/index");
        }catch(PDOException $e){
            throw new PDOException($e);
        }
    }

    //DELETAR PRODUTO COMPOSTO
    public function deletarComposicoes($id){
        $sql = $this->db->prepare("DELETE FROM compostos WHERE id = :id");
        $sql->bindValue(":id", $id);

        try{

            $sql->execute();

        }catch(PDOException $e){
            throw new PDOException($e);
        }
    }   

    //FAZER PERQUISA DA COMPOSIÇÃO POR CÓDIGO
    public function pesquisarComposicoes($codigo){
        $sql = $this->db->prepare("SELECT * FROM compostos WHERE codigo LIKE :codigo");
        $sql->bindValue(":codigo", "%".$codigo."%");

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

    //LISTAR COMPOSIÇÃO POR ID
    public function listarComposicaoId($id){
        $sql = $this->db->prepare("SELECT * FROM compostos WHERE id = :id");
        $sql->bindValue(":id", $id);

        try{
            $sql->execute();
            if($sql->rowCount() == 1){
                $dados = $sql->fetchAll();
                return $dados;
            }
        }catch(PDOException $e){
            throw new PDOException($e);
        }
    }

    public function atualizarComposicao($precoProducao, $markup, $id){
        $sql = $this->db->prepare("UPDATE compostos SET precoProducao = :precoProducao, markup = :markup WHERE id = :id");
        $sql->bindValue(":precoProducao", $precoProducao);
        $sql->bindValue(":markup", $markup);
        $sql->bindValue(":id", $id);

        try{
            $sql->execute();
        }catch(PDOException $e){
            throw new PDOException($e);
        }
    }

    //LISTAR UMA COMPOSIÇÃO POR CÓDIGO
    public function listarComposicao($codigo){
        $sql = $this->db->prepare("SELECT * FROM compostos WHERE codigo = :codigo");
        $sql->bindValue(":codigo", $codigo);

        try{
            $sql->execute();

            if($sql->rowCount() == 1){
                $data = $sql->fetchAll();
                return $data;
            }

        }catch(PDOException $e){
            throw new PDOExcpetion($e);
        }
    }
}

?>