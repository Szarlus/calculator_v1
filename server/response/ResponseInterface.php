<?php
/**
 * Created by PhpStorm.
 * User: karol
 * Date: 19.03.2017
 * Time: 22:08
 */

namespace Calculator\Server\Response;


Interface ResponseInterface
{
    function addHeader($header);

    function send();
}