<?php
/**
 * Created by PhpStorm.
 * User: karol
 * Date: 18.03.2017
 * Time: 13:05
 */

namespace Calculator\Server\Operations;


interface Operation
{
    public function execute($numbers = array());

    function evaluateArguments();
}