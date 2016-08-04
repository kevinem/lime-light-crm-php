<?php


namespace KevinEm\LimeLight\Tests;

use KevinEm\LimeLight\Exceptions\LimeLightTransactionException;
use KevinEm\LimeLight\LimeLight;
use KevinEm\LimeLight\Transaction;
use Mockery as m;

class TransactionTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var LimeLight
     */
    protected $limeLight;

    /**
     * @var Transaction
     */
    protected $transaction;

    /**
     * Sets up the fixture, for example, open a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        parent::setUp();

        $this->limeLight = m::mock(LimeLight::class);
        $this->limeLight->shouldReceive('getBaseUrl')->andReturn('mock_url');
        $this->limeLight->shouldReceive('getResponse')->andReturn([]);
        $this->limeLight->shouldReceive('parseResponse')->andReturn([]);
        $this->transaction = new Transaction($this->limeLight);
    }

    public function testGetMembershipUrl()
    {
        $url = $this->transaction->getTransactionUrl();
        $expected = 'mock_url/admin/transact.php';
        $this->assertEquals($url, $expected);
    }

    public function testExceptionIsThrown()
    {
        $this->expectException(LimeLightTransactionException::class);

        $response = [
            'responseCode' => 200
        ];

        $this->transaction->checkResponse($response);
    }

    public function testNewOrder()
    {
        $this->limeLight->shouldReceive('buildFormParams')->with('NewOrder', [])->andReturn([]);
        $res = $this->transaction->newOrder([]);
        $this->assertEquals($res, []);
    }

    public function testNewOrderCardOnFile()
    {
        $this->limeLight->shouldReceive('buildFormParams')->with('NewOrderCardOnFile', [])->andReturn([]);
        $res = $this->transaction->newOrderCardOnFile([]);
        $this->assertEquals($res, []);
    }

    public function testNewOrderWithProspect()
    {
        $this->limeLight->shouldReceive('buildFormParams')->with('NewOrderWithProspect', [])->andReturn([]);
        $res = $this->transaction->newOrderWithProspect([]);
        $this->assertEquals($res, []);
    }

    public function testAuthorizePayment()
    {
        $this->limeLight->shouldReceive('buildFormParams')->with('authorize_payment', [])->andReturn([]);
        $res = $this->transaction->authorizePayment([]);
        $this->assertEquals($res, []);
    }

    public function testNewProspect()
    {
        $this->limeLight->shouldReceive('buildFormParams')->with('NewProspect', [])->andReturn([]);
        $res = $this->transaction->newProspect([]);
        $this->assertEquals($res, []);
    }

    public function testThreeDRedirect()
    {
        $this->limeLight->shouldReceive('buildFormParams')->with('three_d_redirect', [])->andReturn([]);
        $res = $this->transaction->threeDRedirect([]);
        $this->assertEquals($res, []);
    }
}