<?php

namespace Jeka\QiwiAPI\SOAP;

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