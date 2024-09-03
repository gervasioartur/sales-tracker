<?php

namespace App\domain\exception;

class ConflictException extends \Exception
{
    public function __construct(string $message)
    {
        parent::__construct($message);
    }
}
