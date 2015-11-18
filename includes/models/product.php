<?php

require_once("connection.php");

class Product{
    
    private $iProductID;
    private $sProductName;
    private $sDescription;
    private $dPrice;
    private $iTypeID;
    private $iStockLevel;
    private $sPhotoPath;
    private $bActive;
    
    public function __construct(){
        
        $this->iProductID = 0;
        $this->sProductName = "";
        $this->sDescription = "";
        $this->dPrice = 0;
        $this->iTypeID = 0;
        $this->iStockLevel = 0;
        $this->sPhotoPath = "";
        $this->bActive = true;
        
    }
    
    public function __get($var){
        
        switch($var){
                
            case 'ProductID':
                return $this->iProductID;
                break;
                
            case 'ProductName':
                return $this->sProductName;
                break;
                
            case 'Description':
                return $this->sDescription;
                break;
                
            case 'Price':
                return $this->dPrice;
                break;
                
            case 'TypeID':
                return $this->iTypeID;
                break;
                
            case 'StockLevel':
                return $this->iStockLevel;
                break;
                
            case 'PhotoPath':
                return $this->sPhotoPath;
                break;
                
            case 'Active':
                return $this->bActive;
                break;
                
            default:
                die($var . " is not allowed");
                break;
            
        }
    }
    
    public function __set($var, $value){
        
        switch($var){
                
            case 'ProductID':
                $this->iProductID = $value;
                break;
                
            case 'ProductName':
                $this->sProductName = $value;
                break;
                
            case 'Description':
                $this->sDescription = $value;
                break;
                
            case 'Price':
                $this->dPrice = $value;
                break;
                
            case 'TypeID':
                $this->iTypeID = $value;
                break;
                
            case 'StockLevel':
                $this->iStockLevel = $value;
                break;
                
            case 'PhotoPath':
                $this->$sPhotoPath = $value;
                break;
                
            case 'Active':
                $this->bActive = $value;
                break;
                
            default:
                die($var . " is now allowed");
                break;
        }
        
    }
    
    public function loadProductDetails(){
        
        $oCon = new Connection();
        
        $sSql = "SELECT ProductID, ProductName, Description, Price, TypeID, StockLevel, PhotoPath, Active from tbproduct";
        
        $oResultSet = $oCon->query($sSql);
        
        $aRow = $oCon->fetchArray($oResultSet);
        
        $this->iProductID = $aRow["ProductID"];
        $this->sProductName = $aRow["ProductName"];
        $this->sDescription = $aRow["Description"];
        $this->dPrice = $aRow["Price"];
        $this->iTypeID = $aRow["TypeID"];
        $this->iStockLevel = $aRow["StockLevel"];
        $this->sPhotoPath = $aRow["PhotoPath"];
        $this->bActive = $aRow["Active"];
        
        $oCon->close();
        
    }
    
    public function saveProductDetails(){
        
        $oCon = new Connection();
        
        if($this->iProductID == 0){
            
            $sSql = "INSERT INTO tbproduct (ProductName, Description, Price, TypeID, StockLevel, PhotoPath, Active) VALUES ('"
                .$this->sProductName."', '"
                .$this->sDescription."', '"
                .$this->dPrice."', '"
                .$this->iTypeID."', '"
                .$this->iStockLevel."', '"
                .$this->sPhotoPath."', '"
                .$this->bActive."'
                )";

            $bResult = $oCon->query($sSql);

            if($bResult){

                $this->iProductID = $oCon->getInsertID();

            }else{
                die($sSql . " did not run");
            }
        }else{
            
            $sSql = "UPDATE tbproduct
            SET
                ProductName = '".$this->sProductName."',
                Description = '".$this->sDescription."',
                Price = '".$this->dPrice."',
                TypeID = '".$this->iTypeID."',
                StockLevel = '".$this->iStockLevel."',
                PhotoPath = '".$this->sPhotoPath."',
                Active = '".$this->bActive."'                
            WHERE ProductID = ".$this->iProductID;
            
            $bResult = $oCon->query($sSql);
            
            if(!$bResult){
                die($sSql . " did not run");
            }
            
        }
        
        $oCon->close();
    }
    
}
//
//$oProduct = new Product();
//$oProduct->ProductName = "Samsung 3";
//$oProduct->TypeID = 3;
//$oProduct->saveProductDetails();




?>