<?php
/**
 * Created by PhpStorm.
 * User: karol
 * Date: 18.03.2017
 * Time: 16:42
 */

namespace Calculator\Server\Operations;

class Result
{
    public $error;
    public $operationResult;
    public $errorMessage;

    public function __construct()
    {
        $this->error = false;
        $this->operationResult = null;
        $this->errorMessage = array();
    }



}