<?php
/**
 * Created by PhpStorm.
 * User: karol
 * Date: 19.03.2017
 * Time: 22:46
 */

namespace Calculator\Server\Operations;


class Subtraction extends AbstractOperation
{

    /**
     * Subtraction constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function execute($numbers = array())
    {
        parent::execute($numbers);

        if (!$this->getResult()->error) {
            $this->getResult()->operationResult = $numbers[0] - $numbers[1];
        }

        return $this->result;
    }
}