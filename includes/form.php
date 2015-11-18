<?php

class Form{
    
    private $sHTML;
    private $aData;
    private $aErrors;
    
    public function __construct(){
        
        $this->sHTML = '<form action="" method="post" />';
        
        $this->aData = [];
        
        $this->aErrors = [];
    }
    
    public function makeTextInput($sControlLabel, $sControlName){

        $sControlData = "";
        $sError = "";
        
        if(isset($this->aData[$sControlName])){
            $sControlData = $this->aData[$sControlName];
        }
        
        if(isset($this->aErrors[$sControlName])){
            //There is an error
            $sError = '<p>'.$this->aErrors[$sControlName].'<p>';
            
        }
        
        $this->sHTML .= '
            <label for="'. $sControlName .'"> '. $sControlLabel .' </label>
            <input type="text" id="'. $sControlName .'" name="'. $sControlName .'" value="'. $sControlData .'"/>
        ' . $sError . "\n";
        
    }
    
    public function makeTextArea($sControlLabel, $sControlName){
        
        $sControlData = "";
        $sError = "";
        
        if(isset($this->aData[$sControlName])){
            $sControlData = $this->aData[$sControlName];
        }
        
        if(isset($this->aErrors[$sControlName])){
            //There is an error
            $sError = '<p>'.$this->aErrors[$sControlName].'<p>';
            
        }
        
        $this->sHTML .= '
            <label for="'.$sControlName.'"> '.$sControlLabel.'</label>
            <textarea id="'.$sControlName.'" name="'.$sControlName.'">'. $sControlData .'</textarea/>' .$sError;
    }
    
    public function makeSubmit($sControlLabel){
           $this->sHTML .= '<input type="submit" name="submit" value="'.$sControlLabel.'">';
    }
    
    public function checkRequired($sControlName){
   
        $sControlData = "";
        
        if(isset($this->aData[$sControlName])){
            
            $sControlData = trim($this->aData[$sControlName]);
            
        }
        
        if(strlen($sControlData) == 0){
            
            $this->aErrors[$sControlName] = "Must not be empty";
            
        }
        
    }
    
    public function __get($var){
                
        switch($var){
         
            case 'html';
                return $this->sHTML .'</form>';
                break;
                
            case 'valid';
                if(count($this->aErrors) == 0){
                    return true;
                }else{
                    return false;
                }
                break;
                
            default:
                die($var .' is not allowed');
                break;
                
        }
    }
    
    public function __set($var, $value){
                
        switch($var){
         
            case 'data';
                $this->aData = $value;
                break;
                
            default:
                die($var .' is not allowed');
                break;
                
        }
    }    
    
}


?>