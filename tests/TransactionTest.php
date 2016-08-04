<?php


namespace KevinEm\LimeLightCRM\Tests;

use KevinEm\LimeLightCRM\Exceptions\LimeLightCRMTransactionException;
use KevinEm\LimeLightCRM\LimeLightCRM;
use KevinEm\LimeLightCRM\Transaction;
use Mockery as m;

class TransactionTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var LimeLightCRM
     */
    protected $limeLightCRM;

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

        $this->limeLightCRM = m::mock(LimeLightCRM::class);
        $this->limeLightCRM->shouldReceive('getBaseUrl')->andReturn('mock_url');
        $this->limeLightCRM->shouldReceive('getResponse')->andReturn([]);
        $this->limeLightCRM->shouldReceive('parseResponse')->andReturn([]);
        $this->transaction = new Transaction($this->limeLightCRM);
    }

    public function testGetMembershipUrl()
    {
        $url = $this->transaction->getTransactionUrl();
        $expected = 'mock_url/admin/transact.php';
        $this->assertEquals($url, $expected);
    }

    public function testExceptionIsThrown()
    {
        $this->expectException(LimeLightCRMTransactionException::class);

        $response = [
            'responseCode' => 200
        ];

        $this->transaction->checkResponse($response);
    }

    public function testNewOrder()
    {
        $this->limeLightCRM->shouldReceive('buildFormParams')->with('NewOrder', [])->andReturn([]);
        $res = $this->transaction->newOrder([]);
        $this->assertEquals($res, []);
    }

    public function testNewOrderCardOnFile()
    {
        $this->limeLightCRM->shouldReceive('buildFormParams')->with('NewOrderCardOnFile', [])->andReturn([]);
        $res = $this->transaction->newOrderCardOnFile([]);
        $this->assertEquals($res, []);
    }

    public function testNewOrderWithProspect()
    {
        $this->limeLightCRM->shouldReceive('buildFormParams')->with('NewOrderWithProspect', [])->andReturn([]);
        $res = $this->transaction->newOrderWithProspect([]);
        $this->assertEquals($res, []);
    }

    public function testAuthorizePayment()
    {
        $this->limeLightCRM->shouldReceive('buildFormParams')->with('authorize_payment', [])->andReturn([]);
        $res = $this->transaction->authorizePayment([]);
        $this->assertEquals($res, []);
    }

    public function testNewProspect()
    {
        $this->limeLightCRM->shouldReceive('buildFormParams')->with('NewProspect', [])->andReturn([]);
        $res = $this->transaction->newProspect([]);
        $this->assertEquals($res, []);
    }

    public function testThreeDRedirect()
    {
        $this->limeLightCRM->shouldReceive('buildFormParams')->with('three_d_redirect', [])->andReturn([]);
        $res = $this->transaction->threeDRedirect([]);
        $this->assertEquals($res, []);
    }
}