<?php

require_once("connection.php");

class Customer{
    
    private $iCustomerID;
    private $sFirstName;
    private $sLastName;
    private $sAddress;
    private $sTelephone;
    private $sEmail;
    private $sUsername;
    private $sPassword;
    private $fCredit;
    
    public function __construct(){
        
        $this->iCustomerID = 0;
        $this->sFirstName = "";
        $this->sLastName = "";
        $this->sAddress = "";
        $this->sTelephone = "";
        $this->sEmail = "";
        $this->sUsername = "";
        $this->sPassword = "";
        $this->fCredit = 0;    
    }
    
    public function __get($var){
        
        
        switch ($var) {
                
            case 'CustomerID':
                return $this->iCustomerID;
                break;
            
            case 'FirstName':
                return $this->sFirstName;
                break;
            
            case 'LastName':
                return $this->sLastName;
                break;
                    
            case 'Address':
                return $this->sAddress;
                break;
            
            case 'Telephone':
                return $this->sTelephone;
                break;
                
            case 'Email':
                return $this->sEmail;
                break;
                
            case 'Username':
                return $this->sUsername;
                break;
                
            case 'Password':
                return $this->sPassword;
                break;
                
            case 'Credit': 
                return $this->fCredit;
                break;
                
            default:
                die($var . " is not allowed");
                break;
                
        }
        
    }
    
    public function __set($var, $value){
        
        switch($var) {
                
            case 'CustomerID':
                $this->sCustomerID = $value;
                break;
                
            case 'FirstName':
                $this->sFirstName = $value;
                break;
                
            case 'LastName':
                $this->sLastName = $value;
                break;
                
            case 'Address':
                $this->sAddress = $value;
                break;

            case 'Telephone':
                $this->sTelephone = $value;
                break;

            case 'Email':
                $this->sEmail = $value;
                break;

            case 'Username':
                $this->sUsername = $value;
                break;

            case 'Password':
                $this->sPassword = $value;
                break;

            case 'Credit':
                $this->fCredit = $value;
                break;
                
            default:
                die($var . " is not allowed");
                break;
                
        }
    }
    
    public function loadCustomerDetails(){
        
        $oCon = new Connection();
        
        $sSql = "SELECT CustomerID, FirstName, LastName, Address, Telephone, Email, Username, Password, Credit from tbcustomer";
        
        $oResultSet = $oCon->query($sSql);
        
        $aRow = $oCon->fetchArray($oResultSet);
        
        $this->iCustomerID = $aRow["CustomerID"];
        $this->sFirstName = $aRow["FirstName"];
        $this->sLastName = $aRow["LastName"];
        $this->sAddress = $aRow["Address"];
        $this->sTelephone = $aRow["Telephone"];
        $this->sEmail = $aRow["Email"];
        $this->sUsername = $aRow["Username"];
        $this->sPassword = $aRow["Password"];
        $this->fCredit = $aRow["Credit"];
        
        $oCon->close();
        
    }
    
    public function checkLogin($username, $password){
        
        $oCon = new Connection();
        
        $sSql = "SELECT CustomerID FROM tbcustomer WHERE Username = '".$username."' AND Password = '".$password;
        
        $bResult = $oCon->query($sSql);    
        
        $oCon->close();
        
        return $bResult;
        
    }
    
    public function saveCustomerDetails(){
        
        $oCon = new Connection();
        
        if($this->iCustomerID == 0){
        
            $sSql = "INSERT INTO tbcustomer (FirstName, LastName, Address, Telephone, Email, Username, Password, Credit) VALUES ('"
                .$this->sFirstName."', '"
                .$this->sLastName."', '"
                .$this->sAddress."', '"
                .$this->sTelephone."', '"
                .$this->sEmail."', '"
                .$this->sUsername."', '"
                .$this->sPassword."', '"
                .$this->fCredit."')";

            $bResult = $oCon->query($sSql);
            
            if($bResult){
                
                $this->iCustomerID = $oCon->getInsertID();
                
            }else{
                die($sSql . " did not run");
            }
        }else{
            
            $sSql = "Update tbcustomer
            SET
                FirstName = '".$this->sFirstName."',
                LastName = '".$this->sLastName."',
                Address = '".$this->sAddress."',
                Telephone = '".$this->sTelephone."',
                Email = '".$this->sEmail."',
                Username = '".$this->sUsername."',
                Password = '".$this->sPassword."',
                Credit = '".$this->fCredit."'                
            WHERE CustomerID = ".$this->iCustomerID;
            
            $bResult = $oCon->query($sSql);
            
            if(!$bResult){
                die($sSql . " did not run");
            }
        }
        
        $oCon->close();
        
    }
    
}

//
//$oCustomer = new Customer();
//$oCustomer->FirstName = "Jet";
//$oCustomer->saveCustomerDetails();
?>