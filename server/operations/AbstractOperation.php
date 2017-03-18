<?php
/**
 * Created by PhpStorm.
 * User: karol
 * Date: 18.03.2017
 * Time: 15:02
 */

namespace Calculator\Server\Operations;

require_once 'Result.php';

class AbstractOperation implements Operation
{
    private $numbers = array();
    private $result;

    public function __construct()
    {
        $this->result = new Result;
        var_dump($this->result);
    }


    public function execute($numbers = array())
    {
        $this->numbers = $numbers;
        self::evaluateArguments();

    }

    function evaluateArguments()
    {
        $numbersCount = count($this->numbers);
        for ($index = 0; $index < $numbersCount; $index++) {
            if (!is_numeric($this->numbers[$index])) {

                echo "Argument {$index}: {$this->numbers[$index]} is not a number!";
            }
        }
    }
}