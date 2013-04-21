<?php

namespace Jeka\QiwiAPI\SOAP;

use Jeka\QiwiAPI\SOAP\Parameters\CreateBillParams;
use Jeka\QiwiAPI\SOAP\Parameters\CheckBillParams;
use Jeka\QiwiAPI\SOAP\Parameters\GetBillListParams;
use Jeka\QiwiAPI\SOAP\Parameters\CancelBillParams;
use Jeka\QiwiAPI\SOAP\Response\CheckBillResponse;
use Jeka\QiwiAPI\SOAP\Response\CancelBillResponse;
use Jeka\QiwiAPI\SOAP\Response\CreateBillResponse;
use Jeka\QiwiAPI\SOAP\Response\GetBillListResponse;

class Service extends \SoapClient
{

    private static $classmap = array(
        'checkBill' => 'CheckBillParams',
        'checkBillResponse' => 'CheckBillResponse',
        'getBillList' => 'GetBillListParams',
        'getBillListResponse' => 'GetBillListResponse',
        'cancelBill' => 'CancelBillParams',
        'cancelBillResponse' => 'CancelBillResponse',
        'createBill' => 'CreateBillParams',
        'createBillResponse' => 'CreateBillResponse',
    );

    public function __construct($wsdl = "", $options = array())
    {
        if (!$wsdl) {
            $wsdl = __DIR__ . '/../Resources/wsdl/IShopServerWS.wsdl';
            //$wsdl='https://ishop.qiwi.ru/docs/IShopServerWS.wsdl';
        }

        $options['classmap'] = array_merge(
            $this->createClassMapOptions(self::$classmap),
            isset($options['classmap']) ? $options['classmap'] : array()
        );
        parent::__construct($wsdl, $options);
    }

    public function createClassMapOptions(array $classmap)
    {
        $options = array();
        foreach ($classmap as $key => $value) {

            $ns = substr($value, -1) === 'e' ? 'Response' : 'Parameters';
            $options[$key] = __NAMESPACE__ . '\\' . $ns . '\\' . $value;

        }
        return $options;
    }


    /**
     * @param CheckBillParams $parameters
     * @return CheckBillResponse
     */
    public function checkBill(CheckBillParams $parameters)
    {
        return $this->__soapCall('checkBill', array($parameters), array(
                'uri' => 'http://server.ishop.mw.ru/',
                'soapaction' => ''
            )
        );
    }

    /**
     * @param GetBillListParams $parameters
     * @return GetBillListResponse
     */
    public function getBillList(GetBillListParams $parameters)
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
     * @param CancelBillParams $parameters
     * @return CancelBillResponse
     */
    public function cancelBill(CancelBillParams $parameters)
    {
        return $this->__soapCall('cancelBill', array($parameters), array(
                'uri' => 'http://server.ishop.mw.ru/',
                'soapaction' => ''
            )
        );
    }

    /**
     * @param CreateBillParams $parameters
     * @return CreateBillResponse
     */
    public function createBill(CreateBillParams $parameters)
    {
        return $this->__soapCall('createBill', array($parameters), array(
                'uri' => 'http://server.ishop.mw.ru/',
                'soapaction' => ''
            )
        );
    }

}












