<?php


namespace KevinEm\LimeLight;


use GuzzleHttp\Client;

/**
 * Class LimeLight
 * @package KevinEm\LimeLight
 */
class LimeLight
{

    /**
     * @var Client
     */
    protected $httpClient;

    /**
     * @var string
     */
    protected $baseUrl;

    /**
     * @var string
     */
    protected $username;

    /**
     * @var string
     */
    protected $password;

    /**
     * LimeLight constructor.
     * @param array $options
     */
    public function __construct(array $options)
    {
        $this->baseUrl = $options['base_url'];

        $this->username = $options['username'];

        $this->password = $options['password'];

        $this->setHttpClient(new Client());
    }

    /**
     * @return Client
     */
    public function getHttpClient()
    {
        return $this->httpClient;
    }

    /**
     * @param Client $httpClient
     * @return $this
     */
    public function setHttpClient(Client $httpClient)
    {
        $this->httpClient = $httpClient;

        return $this;
    }

    /**
     * @return string
     */
    public function getBaseUrl()
    {
        return $this->baseUrl;
    }

    /**
     * @param $method
     * @param $uri
     * @param array $options
     * @return mixed
     */
    public function getResponse($method, $uri, array $options = [])
    {
        $res = $this->getHttpClient()->request($method, $uri, $options);
        $parsed = \GuzzleHttp\json_decode($res->getBody()->getContents());

        return $parsed;
    }
}