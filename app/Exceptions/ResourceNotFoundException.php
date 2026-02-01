<?php

namespace App\Exceptions;

use Exception;

class ResourceNotFoundException extends Exception
{
    public string $msg;

    public function __construct($msg)
    {
        $this->msg = $msg;

        parent::__construct($msg);

    }
}
