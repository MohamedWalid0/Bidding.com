<?php

namespace App\Exceptions;

use Exception;

class ProductException extends Exception
{
    /**
     * Report or log an exception.
     *
     * @return string
     */
    public function report()
    {
        return "something wrong Please try again later";
    }
}
