<?php


namespace KevinEm\LimeLight;

use KevinEm\LimeLight\Exceptions\LimeLightTransactionException;


/**
 * Class Transaction
 * @package KevinEm\LimeLight
 */
class Transaction
{

    /**
     * @var LimeLight
     */
    protected $limeLight;

    /**
     * Transaction constructor.
     * @param LimeLight $limeLight
     */
    public function __construct(LimeLight $limeLight)
    {
        $this->limeLight = $limeLight;
    }

    /**
     * @return string
     */
    public function getTransactionUrl()
    {
        return $this->limeLight->getBaseUrl() . '/admin/transact.php';
    }

    /**
     * @param array $response
     * @throws LimeLightTransactionException
     */
    public function checkResponse(array $response)
    {
        if (isset($response['responseCode']) && $response['responseCode'] != 100) {
            throw new LimeLightTransactionException($response['responseCode']);
        }
    }

    /**
     * @param array $data
     * @return array
     */
    public function newOrder(array $data)
    {
        $formParams = $this->limeLight->buildFormParams('NewOrder', $data);

        $res = $this->limeLight->getResponse('POST', $this->getTransactionUrl(), $formParams);

        $parsed = $this->limeLight->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @param array $data
     * @return array
     */
    public function newOrderCardOnFile(array $data)
    {
        $formParams = $this->limeLight->buildFormParams('NewOrderCardOnFile', $data);

        $res = $this->limeLight->getResponse('POST', $this->getTransactionUrl(), $formParams);

        $parsed = $this->limeLight->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @param array $data
     * @return array
     */
    public function newOrderWithProspect(array $data)
    {
        $formParams = $this->limeLight->buildFormParams('NewOrderWithProspect', $data);

        $res = $this->limeLight->getResponse('POST', $this->getTransactionUrl(), $formParams);

        $parsed = $this->limeLight->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @param array $data
     * @return array
     */
    public function authorizePayment(array $data)
    {
        $formParams = $this->limeLight->buildFormParams('authorize_payment', $data);

        $res = $this->limeLight->getResponse('POST', $this->getTransactionUrl(), $formParams);

        $parsed = $this->limeLight->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @param array $data
     * @return array
     */
    public function newProspect(array $data)
    {
        $formParams = $this->limeLight->buildFormParams('NewProspect', $data);

        $res = $this->limeLight->getResponse('POST', $this->getTransactionUrl(), $formParams);

        $parsed = $this->limeLight->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @param array $data
     * @return array
     */
    public function threeDRedirect(array $data)
    {
        $formParams = $this->limeLight->buildFormParams('three_d_redirect', $data);

        $res = $this->limeLight->getResponse('POST', $this->getTransactionUrl(), $formParams);

        $parsed = $this->limeLight->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }
}