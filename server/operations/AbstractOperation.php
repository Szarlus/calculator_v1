<?php
/**
 * Created by PhpStorm.
 * User: karol
 * Date: 18.03.2017
 * Time: 15:02
 */

namespace Calculator\Server\Operations;

class AbstractOperation implements Operation
{
    private $numbers = array();
    protected $result;

    public function __construct()
    {
        $this->result = new Result;
    }


    public function execute($numbers = array())
    {
        $this->numbers = $numbers;
        self::evaluateArguments();

        return $this->result;
    }

    private function evaluateArguments()
    {
        $numbersCount = count($this->numbers);
        for ($index = 0; $index < $numbersCount; $index++) {
            if (!is_numeric($this->numbers[$index])) {
                $this->result->error = true;
                $this->result->errorMessage[] = "Argument {$index}: {$this->numbers[$index]} is not a number!";
            }
        }
    }

    /**
     * @return Result
     */
    public function getResult()
    {
        return $this->result;
    }

}