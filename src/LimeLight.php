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
     * @var Membership
     */
    protected $membership;

    /**
     * @var Transaction
     */
    protected $transaction;

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

        $this->membership = new Membership($this);

        $this->transaction = new Transaction($this);
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

        return $res->getBody()->getContents();
    }

    /**
     * @param $method
     * @param array $data
     * @return array
     */
    public function buildFormParams($method, array $data = [])
    {
        return [
            'form_params' => array_merge_recursive($this->getDefaultFormParams(), compact('method'), $data)
        ];
    }

    /**
     * @return array
     */
    public function getDefaultFormParams()
    {
        return [
            'username' => $this->username,
            'password' => $this->password
        ];
    }

    /**
     * Parse response returned by limelight into an array
     *
     * @param $response
     * @return array
     */
    public function parseResponse($response)
    {
        $array = [];

        $exploded = explode('&', $response);

        foreach ($exploded as $explode) {
            $line = explode('=', $explode);

            if (isset($line[1])) {
                $array[$line[0]] = urldecode($line[1]);
            } else {
                $array[] = $explode;
            }
        }

        return $array;
    }

    /**
     * @return Membership
     */
    public function membership()
    {
        return $this->membership;
    }

    /**
     * @return Transaction
     */
    public function transaction()
    {
        return $this->transaction;
    }
}