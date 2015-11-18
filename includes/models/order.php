<?php

require_once("connection.php");

class Order{
    
    private $iOrderID;
    private $daOrderDate;
    private $daDeliveryDate;
    private $sOrderStatus;
    private $iCustomerID;
    
    public function __construct(){
        
        $this->iOrderID = 0;
        $this->daOrderDate = "";
        $this->daDeliveryDate = "";
        $this->sOrderStatus = "";
        $this->iCustomerID = 0;
    }
    
    public function __get($var){
        
        switch($var){
                
            case 'OrderID':
                return $this->iOrderID;
                break;
            
            case 'OrderDate':
                return $this->daOrderDate;
                break;
                
            case 'DeliveryDate':
                return $this->daDeliveryDate;
                break;
                
            case 'OrderStatus':
                return $this->sOrderStatus;
                break;
                
            case 'CustomerID':
                return $this->iCustomerID;
                break;
                
            default:
                die($var . " is not allowed");
        }
    }
    
    public function __set($var, $value){
        
        
        switch($var){
                
            case 'OrderID':
                $this->iOrderID = $value;
                break;
                
            case 'OrderDate':
                $this->daOrderDate = $value;
                break;
                
            case 'DeliveryDate':
                $this->daDeliveryDate = $value;
                break;
                
            case 'OrderStatus':
                $this->sOrderStatus = $value;
                break;
                
            case 'CustomerID': 
                $this->iCustomerID = $value;
                break;
                
            default: 
                die($var . " is not allowed");
                break;
        }
    }
    
    public function loadOrderDetails(){
        
        $oCon = new Connection();
        
        $sSql = "SELECT OrderID, OrderDate, DeliveryDate, OrderStatus, CustomerID from tborder";
        
        $oResultSet = $oCon->query($sSql);
        
        $aRow = $oCon->fetchArray($oResultSet);
        
        $this->iOrderID = $aRow["OrderID"];
        $this->daOrderDate = $aRow["OrderDate"];
        $this->daDeliveryDate = $aRow["DeliveryDate"];
        $this->sOrderStatus = $aRow["OrderStatus"];
        $this->iCustomerID = $aRow["CustomerID"];
        
        $oCon->close();
    
    }
    
    public function saveOrderDetails(){
        
        $oCon = new Connection();
        
        if($this->iOrderID == 0){
        
            $sSql = "INSERT INTO tborder (OrderID, OrderDate, DeliveryDate, OrderStatus, CustomerID) 
                VALUES ('"
                .$this->iOrderID."', '"
                .$this->OrderDate."', '"
                .$this->DeliveryDate."', '"
                .$this->OrderStatus."', '"
                .$this->CustomerID."'
                )";

            $bResult = $oCon->query($sSql);

            if($bResult){

                $this->iOrderID = $oCon->getInsertID();
            }else {
                die($sSql . " did not run");
            }   
            
        }else{
            
            $sSql = "UPDATE tborder 
            SET
                OrderID = '".$this->iOrderID."',
                OrderDate = '".$this->daOrderDate."',
                DeliveryDate = '".$this->daDeliveryDate."',
                OrderStatus = '".$this->sOrderStatus."',
                CustomerID = '".$this->iCustomerID."',
            WHERE Order ID = ". $this->iOrderID;
            
            $bResult = $oCon->query($sSql);
            
            if(!$bResult){
                die($sSql . " did not run");
            }
        }
        
        $oCon->close();
    }
    
}

//$oOrder = new Order();
//$oOrder->OrderStatus = "Sent";
//$oOrder->CustomerID = 5;
//$oOrder->saveOrderDetails();


?>