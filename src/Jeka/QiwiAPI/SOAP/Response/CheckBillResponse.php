<?php

namespace Jeka\QiwiAPI\SOAP\Response;


class CheckBillResponse
{
    public $user; // string
    public $amount; // string
    public $date; // string
    public $lifetime; // string
    public $status; // int
}