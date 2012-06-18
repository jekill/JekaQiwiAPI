<?php


namespace Jeka\QiwiAPI\SOAP;

abstract class Client
{

    private $login;
    private $password;
    protected $wsdl;

    public function __construct($login, $password,$options=array())
    {
        $this->login = $login;
        $this->password = $password;

        if (!isset($options['wsdl'])){
            $this->wsdl = __DIR__ . '/../Resources/wsdl/IShopClientWS.wsdl';
        }
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getPassword(){
        return $this->password;
    }

    public function getWSDLFile()
    {
        return $this->wsdl;
    }

    abstract public function updateBill(UpdateBillParams $params);

    private function check(UpdateBillParams $params)
    {
        $in_check_value =  $params->password;
        $real_check_value = strtoupper(md5($params->txn. strtoupper(md5($this->password))));
        return $in_check_value === $real_check_value;
    }
}

class UpdateBillParams
{
    public $login;
    public $password;
    public $txn;
    public $status;
}

class UpdateBillResponse
{
    public $updateBillResult;
}


