<?php

namespace Jeka\QiwiAPI\SOAP;



/**
 * IShopServerWSService class
 *
 *
 *
 * @author    {author}
 * @copyright {copyright}
 * @package   {package}
 */
class Service extends \SoapClient
{

    private static $classmap = array(
        'checkBill' => 'checkBill',
        'checkBillResponse' => 'checkBillResponse',
        'getBillList' => 'getBillList',
        'getBillListResponse' => 'getBillListResponse',
        'cancelBill' => 'cancelBill',
        'cancelBillResponse' => 'cancelBillResponse',
        'createBill' => 'createBill',
        'createBillResponse' => 'createBillResponse',
    );

    public function __construct($wsdl = "", $options = array())
    {
        if (!$wsdl) {
            $wsdl = __DIR__ . '/../Resources/wsdl/IShopServerWS.wsdl';
            //$wsdl='https://ishop.qiwi.ru/docs/IShopServerWS.wsdl';
        }

        foreach (self::$classmap as $key => $value) {
            if (!isset($options['classmap'][$key])) {
                $options['classmap'][$key] = __NAMESPACE__.'\\'.$value;
            }
        }
        parent::__construct($wsdl, $options);
    }

    /**
     * @param checkBill $parameters
     * @return checkBillResponse
     */
    public function checkBill(checkBill $parameters)
    {
        return $this->__soapCall('checkBill', array($parameters), array(
                'uri' => 'http://server.ishop.mw.ru/',
                'soapaction' => ''
            )
        );
    }

    /**
     * @param getBillList $parameters
     * @return getBillListResponse
     */
    public function getBillList(getBillList $parameters)
    {
        return $this->__soapCall('getBillList', array($parameters), array(
                'uri' => 'http://server.ishop.mw.ru/',
                'soapaction' => ''
            )
        );
    }

    /**
     *
     *
     * @param cancelBill $parameters
     * @return cancelBillResponse
     */
    public function cancelBill(cancelBill $parameters)
    {
            return $this->__soapCall('cancelBill', array($parameters), array(
                'uri' => 'http://server.ishop.mw.ru/',
                'soapaction' => ''
            )
        );
    }

    /**
     *
     *
     * @param createBill $parameters
     * @return createBillResponse
     */
    public function createBill(createBill $parameters)
    {
        return $this->__soapCall('createBill', array($parameters), array(
                'uri' => 'http://server.ishop.mw.ru/',
                'soapaction' => ''
            )
        );
    }

}



class checkBill
{
    public $login; // string
    public $password; // string
    public $txn; // string
}

class checkBillResponse
{
    public $user; // string
    public $amount; // string
    public $date; // string
    public $lifetime; // string
    public $status; // int
}

class getBillList
{
    public $login; // string
    public $password; // string
    public $dateFrom; // string
    public $dateTo; // string
    public $status; // int
}

class getBillListResponse
{
    public $txns; // string
    public $count; // int
}

class cancelBill
{
    public $login; // string
    public $password; // string
    public $txn; // string
}

class cancelBillResponse
{
    public $cancelBillResult; // int
}

class createBill
{
    public $login; // string
    public $password; // string
    public $user; // string
    public $amount; // string
    public $comment; // string
    public $txn; // string
    public $lifetime; // string
    public $alarm; // int
    public $create; // boolean
}

class createBillResponse
{
    public $createBillResult; // int
}
