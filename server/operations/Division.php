<?php
/**
 * Created by PhpStorm.
 * User: karol
 * Date: 19.03.2017
 * Time: 22:58
 */

namespace Calculator\Server\Operations;


class Division extends AbstractOperation
{

    /**
     * Division constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function execute($numbers = array())
    {
        parent::execute($numbers);
        $this->evaluateArguments($numbers);

        if (!$this->getResult()->error) {
            $this->getResult()->operationResult = $numbers[0] / $numbers[1];
        }

        return $this->result;
    }

    public function evaluateArguments($numbers)
    {
        if ($numbers[1] == 0) {
            $this->result->error = true;
            $this->result->errorMessage[] = "Division by zero is undefined!";
        }
    }
}