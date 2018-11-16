<?php 

class Produtos extends Model{

    //SALVAR PRODUTOS QUE VÃO SER PARTE DOS COMPOSTOS
    public function salvarProdutos($sku, $preco, $nome){
        $sql = $this->db->prepare("INSERT INTO produtos SET sku = :sku, preco = :preco, nome = :nome");
        $sql->bindValue(":sku", $sku);
        $sql->bindValue(":preco", $preco);
        $sql->bindValue(":nome", $nome);

        try{
            $sql->execute();
        }catch(PDOException $e){
            throw new PDOException($e);
        }
    }

    //ADICIONAR PRODUTOS NO COMPOSTO
    public function adicionarProdutos($sku, $preco, $nome, $idComposto){
        $sql = $this->db->prepare("INSERT INTO produtos SET sku = :sku, preco = :preco, nome = :nome, idComposto = :idComposto");
        $sql->bindValue(":sku", $sku);
        $sql->bindValue(":preco", $preco);
        $sql->bindValue(":nome", $nome);
        $sql->bindValue(":idComposto", $idComposto);

        try{
            $sql->execute();
        }catch(PDOException $e){
            throw new PDOException($e);
        }
    }

    //LISTAR PRODUTOS PELO ID DA COMPOSIÇÃO
    public function listarProdutos($idComposto){
        $sql = $this->db->prepare("SELECT * FROM produtos WHERE idComposto = :idComposto");
        $sql->bindValue(":idComposto", $idComposto);

        try{
            $sql->execute();
            if($sql->rowCount() > 0){
                $data = $sql->fetchAll();
                return $data;
            }
        }catch(PDOException $e ){
            throw new PDOException($e);
        }
    }

    //DELETAR PRODUTO PELO ID DO MESMO
    public function deletarProdutos($id){
        $sql = $this->db->prepare("DELETE FROM produtos WHERE id = :id");
        $sql->bindValue(":id", $id);

        try{
            $sql->execute();
        }catch(PDOException $e){
            throw new PDOExcpetion($e);
        }
    }
}

?>