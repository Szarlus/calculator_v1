<?php
/**
 * Created by PhpStorm.
 * User: karol
 * Date: 15.03.2017
 * Time: 00:14
 */

namespace Calculator\Server;

use Calculator\Server\Response\Response;

class RestServer
{

    private $args = array();
    private $pathInfo;


    /**
     * RestServer constructor.
     */
    public function __construct()
    {
        $this->extractPathInfo();
        $this->start();
    }

    private function extractPathInfo()
    {
        $this->pathInfo = trim(getenv('PATH_INFO'), '/');
    }

    public function start()
    {
        $result = null;
        if ($this->evaluatePathInfo()) {
            $this->setArgs(explode('/', $this->pathInfo));

            $calculator = Calculator::getInstance();

            $calculator->setUp($this->args);
            $result = $calculator->executeOperation();

            $this->returnResponse($result);
        }


    }

    private function evaluatePathInfo()
    {
        return true;
        $twoNumbersPattern = '@^(add|sub|mul|div)\/(\d+|\d+.\d+)\/(\d+|\d+.\d+)$@';
        if ($this->pathInfo) {
            return preg_match($twoNumbersPattern, $this->pathInfo);
        }

        return false;
    }

    /**
     * @param array $args
     */
    public function setArgs($args)
    {
        $this->args = $args;
    }

    private function returnResponse($result)
    {
        $response = new Response();
        $response->setMessage($result);
        if ($result->error) {
            $response->setStatus(400);
        }
        $response->send();
    }
}