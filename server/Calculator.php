<?php
/**
 * Created by PhpStorm.
 * User: karol
 * Date: 18.03.2017
 * Time: 12:59
 */

namespace Calculator\Server;

require_once SERVER_DIR.'operations'.DS.'Operation.php';
require_once SERVER_DIR.'operations'.DS.'AbstractOperation.php';
require_once SERVER_DIR.'operations'.DS.'OperationFactory.php';

use Calculator\Server\Operations;

final class Calculator
{
    private $arguments;
    private $operation;
    private static $instance;

    public static function getInstance()
    {
        if (static::$instance === null) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    /**
     * Calculator constructor.
     */
    public function setup($serverArgs)
    {
        $this->arguments = $serverArgs;
        $this->setOperation(Operations\OperationFactory::factory($serverArgs[0]));
    }

    public function executeOperation()
    {
        $this->operation->execute(array($this->arguments[1], $this->arguments[2]));
    }

    /**
     * @param mixed $operation
     */
    public function setOperation(Operations\Operation $operation)
    {
        $this->operation = $operation;
    }


}