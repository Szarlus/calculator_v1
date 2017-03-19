<?php
/**
 * Created by PhpStorm.
 * User: karol
 * Date: 19.03.2017
 * Time: 22:11
 */

namespace Calculator\Server\Response;


class AbstractResponse implements ResponseInterface
{
    protected $status;

    protected $headers;

    protected $message;

    /**
     * AbstractResponse constructor.
     */
    public function __construct()
    {
        $this->setStatus(200);
        $this->addHeader('Cache-Control: no-cache');
        $this->addHeader('Content-Type: application/json');
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    function addHeader($header)
    {
        $this->headers[] = $header;
    }

    function send()
    {
        ob_clean();
        ob_start();

        foreach ($this->headers as $header) {
            header($header);
        }

        http_response_code($this->status);

        echo json_encode($this->message, JSON_PRETTY_PRINT);
        die();
    }

    /**
     * @param mixed $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }


}