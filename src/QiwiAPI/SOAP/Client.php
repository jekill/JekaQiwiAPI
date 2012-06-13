<?php


namespace Jeka\QiwiAPI\SOAP;


abstract class Client
{

    private $login;
    private $password;

    public function __construct($login, $password)
    {
        $this->login = $login;
        $this->password = $password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getWSDLFile()
    {
        return __DIR__ . '/../Resources/wsdl/IShopClientWS.wsdl';
    }

    abstract public function updateBill(UpdateBillParams $params);
//    {
//        $result = new UpdateBillResponse();
//
//        if (!$this->check($params)){
//          $result->updateBillResult = ResultsList::AUTHENTICATION_ERROR;
//          return $result;
//        }
//        $invoice = $this->invoice_manager->findById($params->txn);
//        $old_status = $invoice->getStatus();
//
//
//        if (StatusesList::COMPLETED == $old_status) {
//            $result->updateBillResult = ResultsList::SUCCESS;
//        }
//
//        $invoice->setStatus($params->status);
//        $this->invoice_manager->update($invoice, true);
//
//        if ($invoice->getStatus() == StatusesList::COMPLETED) {
//            try {
//                $this->invoice_manager->completeInvoice($invoice);
//            } catch (\Exception $e) {
//                $result->updateBillResult = ResultsList::UNKNOWN_ERROR;
//                return $result;
//            }
//        }
//
//        $result->updateBillResult = ResultsList::SUCCESS;
//        return $result;
//    }

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

class ResultsList
{
    const SUCCESS = 0;
    const SERVER_IS_BUSY = 13;
    const AUTHENTICATION_ERROR = 150;
    const INVOICE_NOT_FOUND = 210;
    const UNKNOWN_ERROR = 300;
}

class StatusesList
{
    /** Выставлен */
    const SUBMITED = 50;
    /** Оплачивается */
    const IN_PROCESS = 52;
    /** Оплачен */
    const COMPLETED = 60;
    const CANCEL_TERMENAL_ERROR = 150;
    /** Отменен по разным причаинам, недостаток средств итд.. */
    const CANCEL_ERROR = 151;
    const CANCEL = 160;
    const CANCEL_TIMEOUT = 161;
}