<?php
/**
 * Created by PhpStorm.
 * User: karol
 * Date: 18.03.2017
 * Time: 14:01
 */

namespace Calculator\Server\Operations;

require_once 'Addition.php';

class OperationFactory
{
    public static function factory($operationType)
    {
        switch ($operationType) {
            case 'add':
                return new Addition;
                break;
//            case 'sub':
//                return new Subtraction;
//                break;
//            case 'mul':
//                return new Multiplication;
//                break;
//            case 'div':
//                return new Division;
//                break;
            default:
                throw new \InvalidArgumentException('Invalid operation');
                break;
        }
    }
}