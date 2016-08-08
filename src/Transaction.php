<?php


namespace KevinEm\LimeLightCRM;

use KevinEm\LimeLightCRM\Exceptions\LimeLightCRMTransactionException;


/**
 * Class Transaction
 * @package KevinEm\LimeLightCRM
 */
class Transaction
{

    /**
     * @var LimeLightCRM
     */
    protected $limeLightCRM;

    /**
     * Transaction constructor.
     * @param LimeLightCRM $limeLightCRM
     */
    public function __construct(LimeLightCRM $limeLightCRM)
    {
        $this->LimeLightCRM = $limeLightCRM;
    }

    /**
     * @return string
     */
    public function getTransactionUrl()
    {
        return $this->LimeLightCRM->getBaseUrl() . '/admin/transact.php';
    }

    /**
     * @param array $response
     * @throws LimeLightCRMTransactionException
     */
    public function checkResponse(array $response)
    {
        $exception = null;

        if (isset($response['responseCode'])) {
            $responses = explode(',', $response['responseCode']);

            foreach ($responses as $code) {
                if (!in_array($code, [100])) {
                    $exception = new LimeLightCRMTransactionException($code, $exception);
                }
            }
        }

        if (isset($exception)) {
            throw $exception;
        }
    }

    /**
     * @param array $data
     * @return array
     */
    public function newOrder(array $data)
    {
        $formParams = $this->LimeLightCRM->buildFormParams('NewOrder', $data);

        $res = $this->LimeLightCRM->getResponse('POST', $this->getTransactionUrl(), $formParams);

        $parsed = $this->LimeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @param array $data
     * @return array
     */
    public function newOrderCardOnFile(array $data)
    {
        $formParams = $this->LimeLightCRM->buildFormParams('NewOrderCardOnFile', $data);

        $res = $this->LimeLightCRM->getResponse('POST', $this->getTransactionUrl(), $formParams);

        $parsed = $this->LimeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @param array $data
     * @return array
     */
    public function newOrderWithProspect(array $data)
    {
        $formParams = $this->LimeLightCRM->buildFormParams('NewOrderWithProspect', $data);

        $res = $this->LimeLightCRM->getResponse('POST', $this->getTransactionUrl(), $formParams);

        $parsed = $this->LimeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @param array $data
     * @return array
     */
    public function authorizePayment(array $data)
    {
        $formParams = $this->LimeLightCRM->buildFormParams('authorize_payment', $data);

        $res = $this->LimeLightCRM->getResponse('POST', $this->getTransactionUrl(), $formParams);

        $parsed = $this->LimeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @param array $data
     * @return array
     */
    public function newProspect(array $data)
    {
        $formParams = $this->LimeLightCRM->buildFormParams('NewProspect', $data);

        $res = $this->LimeLightCRM->getResponse('POST', $this->getTransactionUrl(), $formParams);

        $parsed = $this->LimeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @param array $data
     * @return array
     */
    public function threeDRedirect(array $data)
    {
        $formParams = $this->LimeLightCRM->buildFormParams('three_d_redirect', $data);

        $res = $this->LimeLightCRM->getResponse('POST', $this->getTransactionUrl(), $formParams);

        $parsed = $this->LimeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }
}