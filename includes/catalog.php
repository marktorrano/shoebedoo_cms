<?php

class Catalog{
    
    private $sHTML;
    private $aData;
    private $aErrors;
    
    public function __construct(){
        
        $this->sHTML = '';
        
        $this->aData = [];
        
        $this->aErrors = [];
        
    }
    
    public function makeItemDiv($sPhotoPath, $sProductName){
        
        $this->sHTML .= '<div class="row items">';
        
        $this->sHTML .= '<div class="col l4"><img src="'.$sPhotoPath.'"/></div>';
        
        $this->sHTML .= '<div class="col l6">'.$sProductName.'</div>';
        
        $this->sHTML .= '</div>';
        
        
        Test
    }
    
    public function __get($var){
        
        switch($var){
                
            case 'html':
                return $this->sHTML;
                break;
                
            default:
                die($var . " is not allowed");
                break;
        }
                
    }
    
    public function __set($var, $value){
        
        switch($var){
                
            case 'data':
                $this->aData = $value;
                break;
                
            default:
                die($var . " is not allowed");
                break;
        }
        
    }
    
}



?>