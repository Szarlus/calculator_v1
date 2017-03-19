<?php
/**
 * Created by PhpStorm.
 * User: karol
 * Date: 18.03.2017
 * Time: 14:58
 */

namespace Calculator\Server\Operations;

class Addition extends AbstractOperation
{

    /**
     * Addition constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function execute($numbers = array())
    {
        parent::execute($numbers);

        if (!$this->getResult()->error) {
            $this->getResult()->operationResult = $numbers[0] + $numbers[1];
        }

        return $this->result;
    }
}