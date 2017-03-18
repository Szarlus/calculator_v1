<?php
/**
 * Created by PhpStorm.
 * User: karol
 * Date: 15.03.2017
 * Time: 00:14
 */

namespace Calculator\Server;

require_once SERVER_DIR.'Calculator.php';

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

    public function start()
    {

        if ($this->evaluatePathInfo()) {
            $this->setArgs(explode('/', $this->pathInfo));

            $calculator = Calculator::getInstance();

            $calculator->setUp($this->args);
            $calculator->executeOperation();
        }

        var_dump($this->args);


//        //$preg = preg_match($pattern, $this->pathInfo, $matches);
//        var_dump($preg);
//        var_dump($matches);
        // Get request url and script url


        // Get our url path and trim the / of the left and the right
//        if ($request_url != $script_url) {
//            $url = trim(preg_replace('/'.str_replace('/', '\/', str_replace('index.php', '', $script_url)).'/', '',
//                $request_url, 1), '/');
//        }

//        if ($url) {
//            $operands = explode('/', $url);
//        }

//        var_dump($request_url);
//        var_dump($script_url);
//        var_dump($url);
//        var_dump($operands);
    }

    /**
     * @param array $args
     */
    public function setArgs($args)
    {
        $this->args = $args;
    }

    private function extractPathInfo()
    {
        $this->pathInfo = trim(getenv('PATH_INFO'), '/');
    }

    private function evaluatePathInfo()
    {return true;
        $twoNumbersPattern = '@^(add|sub|mul|div)\/(\d+|\d+.\d+)\/(\d+|\d+.\d+)$@';
        if ($this->pathInfo) {
            return preg_match($twoNumbersPattern, $this->pathInfo);
        }
        return false;
    }
}