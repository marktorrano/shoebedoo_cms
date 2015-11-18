<?php

require_once("connection.php");

class Orderline{
        
    private $iOrderlineID;
    private $iOrderID;
    private $iProductID;
    private $iQuantity;
    
    public function __construct(){
        
        $this->iOrderlineID = 0;
        $this->iOrderID = 0;
        $this->iProductID = 0;
        $this->iQuantity = 0;
        
    }
    
    public function __get($var){
        
        switch($var){
                
            case 'OrderlineID':
                return $this->iOrderLineID;
                break;
                
            case 'OrderID':
                return $this->iOrderID;
                break;
                
            case 'ProductID':
                return $this->iProductID;
                break;
                
            case 'Quantity':
                return $this->iQuantity;
                break;
                
            default:
                die($var . " is not allowed");
                
        }
    }
    
    public function __set($var, $value){
        
        switch($var){
                
            case 'OrderlineID':
                $this->iOrderlineID = $value;
                break;
                
            case 'OrderID':
                $this->iOrderID = $value;
                break;
                
            case 'ProductID':
                $this->iProductID = $value;
                break;
                
            case 'Quantity':
                $this->iQuantity = $value;
                break;
                
            default:
                die($var . " is not allowed");                
                                
        }
                
    }
    
    public function loadOrderlineDetails(){
        
        $oCon = new Connection();
        
        $sSql = "SELECT OrderlineID, OrderID, ProductID, Quantity FROM tborderline";
        
        $oResultSet = $oCon->query($sSql);
        
        $aRow = $oCon->fetchArray($oResultSet);
        
        $this->$iOrderlineID = $aRow["OrderlineID"];
        $this->$iOrderID = $aRow["OrderID"];
        $this->$iProductID = $aRow["ProductID"];
        $this->$iQuantity = $aRow["Quantity"];
        
        $oCon->close();
    }
    
    public function saveOrderlineDetails(){
        
        $oCon = new Connection();
        
        if($this->iOrderlineID == 0){
            
            $sSql = "INSERT INTO tborderline (OrderID, ProductID, Quantity) 
            VALUES ('"
                .$this->iOrderID."', '"
                .$this->iProductID."', '"
                .$this->iQuantity."'
            )";
            
            $bResult = $oCon->query($sSql);
            
            if($bResult){
                
                $this->iOrderlineID = $oCon->getInsertID();
                
            }else{
                die($sSql . " did not run");
            }
            
        }else{
            
            $sSql = "UPDATE tborderline 
            SET
                OrderID = '".$this->iOrderID."', 
                ProductID = '".$this->iProductID."', 
                Quantity = '".$this->iQuantity."' 
            WHERE OrderlineID = ".$this->iOrderlineID;
            
            $bResult = $oCon->query($sSql);
            
            if(!$bResult){
                
                die($sSql . " did not run");
                
            }
                        
        }
        
        $oCon->close();
    }
}


//$oCustomer = new Customer;
//$oCustomer->FirstName = "Jet";
//$oCustomer->saveCustomerDetails();
    
$oOrderline = new Orderline();
$oOrderline->OrderID = 1;
$oOrderline->ProductID = 8;
$oOrderline->Quantity = 5;
$oOrderline->saveOrderlineDetails();

?>