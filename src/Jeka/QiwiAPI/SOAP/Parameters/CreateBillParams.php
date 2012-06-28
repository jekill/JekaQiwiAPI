<?php

namespace Jeka\QiwiAPI\SOAP\Parameters;

class CreateBillParams
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
