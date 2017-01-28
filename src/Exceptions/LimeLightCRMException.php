<?php


namespace KevinEm\LimeLightCRM\Exceptions;


abstract class LimeLightCRMException extends \Exception
{

    /**
     * @var array
     */
    private $response;

    /**
     * LimeLightCRMException constructor.
     * @param string $message
     * @param string $code
     * @param \Exception $previous
     * @param array $response
     */
    public function __construct($message, $code, \Exception $previous = null, array $response = [])
    {
        parent::__construct($message, $code, $previous);
        $this->response = $response;
    }

    abstract function getExceptionMessage($code);

    /**
     * @return array
     */
    public function getResponse()
    {
        return $this->response;
    }
}