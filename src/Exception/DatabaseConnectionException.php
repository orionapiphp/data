<?php


namespace OrionApi\Db\Exception;

use Exception;

class DatabaseConnectionException extends Exception{

    public function __construct($message)
    {
        parent::__construct($message);
    }
}