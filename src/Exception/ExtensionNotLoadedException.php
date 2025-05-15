<?php

namespace OrionApi\Db\Exception;

use Exception;

class ExtensionNotLoadedException extends Exception{

    public function __construct($message)
    {
        parent::__construct($message);
    }
}