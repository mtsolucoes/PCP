<?php 

class Controller {

    public function loadView($viewName, $viewData = array()){
        extract($viewData);
        require "views/".$viewName.".php";
    }

    public function loadTemplate($viewName, $viewData = array(), $vmData = array()){
        require "views/template.php";
    }

    public function loadViewInTemplate($viewName, $viewData = array(), $vmData = array()){
        if(is_array($viewData)){
            extract($viewData);
        }
        if(is_array($vmData)){
            extract($vmData);
        }
        require "views/".$viewName.".php";
    }

}


?>