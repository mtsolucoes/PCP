<?php 
//classe das requisições na API do Bling
class Bling extends Model {    

    //GET EM PRODUTOS DO BLING
    public function executeGetProduct($url, $apikey){
        $curl_handle = curl_init();
        curl_setopt($curl_handle, CURLOPT_URL, $url . '&apikey=' . $apikey. '&estoque=S');
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, TRUE);
        $response = curl_exec($curl_handle);
        curl_close($curl_handle);
        $json = json_decode($response);
        //CASO NÃO HAJA PRODUTOS NA BUSCA NÃO RETORNA NADA
        if(isset($json->retorno->erros)){
            return false;
        //CASO HAJA PRODUTOS RETORNA O A ARRAY PRODUTOS
        }else if(isset($json->retorno->produtos)){
            $json = (array) $json->retorno->produtos;
            return $json;
        }  
    }
    
    //GET EM TODOS OS PEDIDOS NO BLING
    public function executeGetOrder($url, $apikey){
        $curl_handle = curl_init();
        curl_setopt($curl_handle, CURLOPT_URL, $url . '&apikey='. $apikey);
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, TRUE);
        $response = curl_exec($curl_handle);
        curl_close($curl_handle);
        $json = json_decode($response);
        //CASO NÃO HAJA PRODUTOS NA BUSCA NÃO RETORNA NADA
        if(isset($json->retorno->erros)){
            return false;
        //CASO HAJA PRODUTOS RETORNA O A ARRAY PRODUTOS
        }else if(isset($json->retorno->pedidos)){
            $json = (array) $json->retorno->pedidos;
            return $json;
        }
    }

    //GET EM TODOS OS PRODUTOS EM ABERTO
    public function executeGetOrderOnOpen($url, $apikey){
        $curl_handle = curl_init();
        curl_setopt($curl_handle, CURLOPT_URL, $url . '&apikey='. $apikey . '&idSituacao[6]');
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, TRUE);
        $response = curl_exec($curl_handle);
        curl_close($curl_handle);
        $json = json_decode($response);
        //CASO NÃO HAJA PRODUTOS NA BUSCA NÃO RETORNA NADA
        if(isset($json->retorno->erros)){
            return false;
        //CASO HAJA PRODUTOS RETORNA O A ARRAY PRODUTOS
        }else if(isset($json->retorno->pedidos)){
            $json = (array) $json->retorno->pedidos;
            return $json;
        }
    }

    //GET EM PEDIDOS POR NÚMERO DE PEDIDO
    public function executeGetOrderNumber($url, $apikey){
        $curl_handle = curl_init();
        curl_setopt($curl_handle, CURLOPT_URL, $url . '&apikey='. $apikey );
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, TRUE);
        $response = curl_exec($curl_handle);
        curl_close($curl_handle);
        $json = json_decode($response);
        //CASO NÃO HAJA PRODUTOS NA BUSCA NÃO RETORNA NADA
        if(isset($json->retorno->erros)){
            return false;
        //CASO HAJA PRODUTOS RETORNA O A ARRAY PRODUTOS
        }else if(isset($json->retorno->pedidos)){
            $json = (array) $json->retorno->pedidos;
            return $json;
        }
    }
}

?> 