<?php 
//Classe com metodos facilitadores.
class Facilities {

    //Método para conversão de data padrão americano para padrão brasileiro
    public function convertDate($date){
        return date('d/m/Y', strtotime($date));
    }

    public function limparString($string){
        strtolower($string);
        str_replace('ç', 'c', $string);
        str_replace('ã' , 'a', $string);
        preg_repace('/[ -]+/', '-', $string);

        return $string;
    }

}

?>