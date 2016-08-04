<?php


namespace KevinEm\LimeLightCRM\Tests;


use GuzzleHttp\Client;
use KevinEm\LimeLightCRM\LimeLightCRM;
use Mockery as m;
use Mockery\MockInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

class LimeLightCRMTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var LimeLightCRM
     */
    protected $limeLightCRM;

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

        $this->limeLightCRM = new LimeLightCRM([
            'base_url' => 'mock_base_url',
            'username' => 'mock_username',
            'password' => 'mock_password'
        ]);

        $this->limeLightCRM->setHttpClient($this->clientMock);

        $this->responseMock = m::mock(ResponseInterface::class);

        $this->streamMock = m::mock(StreamInterface::class);
    }

    public function testGetHttpClientNotNull()
    {
        $this->assertNotNull($this->limeLightCRM->getHttpClient());
    }

    public function testGetBaseUrl()
    {
        $this->assertEquals($this->limeLightCRM->getBaseUrl(), 'mock_base_url');
    }

    public function testGetResponse()
    {
        $mock_content = 'mock1=mock2&mock3=mock4';

        $this->streamMock->shouldReceive('getContents')->once()->andReturn($mock_content);
        $this->responseMock->shouldReceive('getBody')->once()->andReturn($this->streamMock);
        $this->clientMock->shouldReceive('request')->with('mock_method', 'mock_uri',
            [])->once()->andReturn($this->responseMock);
        $res = $this->limeLightCRM->getResponse('mock_method', 'mock_uri', []);
        $this->assertEquals($mock_content, $res);
    }

    public function testBuildFormParams()
    {
        $expected = [
            'form_params' => [
                'username'    => 'mock_username',
                'password'    => 'mock_password',
                'method'      => 'mock_method',
                'mock_field1' => 'mock_value1',
                'mock_field2' => [
                    'mock_sub_field1' => 'mock_value2'
                ]
            ]
        ];

        $data = [
            'mock_field1' => 'mock_value1',
            'mock_field2' => [
                'mock_sub_field1' => 'mock_value2'
            ]
        ];

        $this->assertEquals($expected, $this->limeLightCRM->buildFormParams('mock_method', $data));
    }

    public function testGetDefaultFormParams()
    {
        $expected = [
            'username' => 'mock_username',
            'password' => 'mock_password'
        ];

        $this->assertEquals($expected, $this->limeLightCRM->getDefaultFormParams());
    }

    public function testParseResponse()
    {
        $response = 'mock1=mock2&mock3=mock4';

        $res = $this->limeLightCRM->parseResponse($response);

        $expected = [
            'mock1' => 'mock2',
            'mock3' => 'mock4'
        ];

        $this->assertEquals($res, $expected);

        $response = 'mock1=mock2';

        $res = $this->limeLightCRM->parseResponse($response);

        $expected = [
            'mock1' => 'mock2'
        ];

        $this->assertEquals($res, $expected);

        $response = 'mock1';

        $res = $this->limeLightCRM->parseResponse($response);

        $expected = [
            'mock1'
        ];

        $this->assertEquals($res, $expected);
    }

    public function testMembershipNotNull()
    {
        $this->assertNotNull($this->limeLightCRM->membership());
    }

    public function testTransactionNotNull()
    {
        $this->assertNotNull($this->limeLightCRM->transaction());
    }
}