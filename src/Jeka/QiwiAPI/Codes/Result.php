<?php

namespace Jeka\QiwiAPI\Codes;

final class Results
{
    const SUCCESS = 0;
    const SERVER_IS_BUSY = 13;
    const AUTHENTICATION_ERROR = 150;
    const INVOICE_NOT_FOUND = 210;
    const UNKNOWN_ERROR = 300;
}
