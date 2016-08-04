<?php


namespace KevinEm\LimeLight\Tests;


use GuzzleHttp\Client;
use KevinEm\LimeLight\LimeLight;
use Mockery as m;
use Mockery\MockInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

class LimeLightTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var LimeLight
     */
    protected $limeLight;

    /**
     * @var MockInterface
     */
    protected $clientMock;

    /**
     * @var MockInterface
     */
    protected $responseMock;

    /**
     * @var MockInterface
     */
    protected $streamMock;

    protected function setUp()
    {
        parent::setUp();

        $this->clientMock = m::mock(Client::class);

        $this->limeLight = new LimeLight([
            'base_url' => 'mock_base_url',
            'username' => 'mock_username',
            'password' => 'mock_password'
        ]);

        $this->limeLight->setHttpClient($this->clientMock);

        $this->responseMock = m::mock(ResponseInterface::class);

        $this->streamMock = m::mock(StreamInterface::class);
    }

    public function testGetHttpClientNotNull()
    {
        $this->assertNotNull($this->limeLight->getHttpClient());
    }

    public function testGetBaseUrl()
    {
        $this->assertEquals($this->limeLight->getBaseUrl(), 'mock_base_url');
    }

    public function testGetResponse()
    {
        $mock = [
            'mock_field' => 'mock_data'
        ];

        $this->streamMock->shouldReceive('getContents')->once()->andReturn(\GuzzleHttp\json_encode($mock));
        $this->responseMock->shouldReceive('getBody')->once()->andReturn($this->streamMock);
        $this->clientMock->shouldReceive('request')
            ->with('mock_method', 'mock_uri', $mock)->once()->andReturn($this->responseMock);
        $res = $this->limeLight->getResponse('mock_method', 'mock_uri', $mock);
        $this->assertEquals($mock, (array)$res);
    }
}