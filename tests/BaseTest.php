<?php

namespace Railken\Ibm\Assistant\Test;

use PHPUnit\Framework\TestCase;
use Railken\Ibm\Assistant\Client;

class BaseTest extends TestCase
{	
	public function setUp()
	{
		$dotenv = \Dotenv\Dotenv::create(__DIR__."/..");
		$dotenv->load();

		$this->client = new Client(getenv('URL'), getenv('KEY'), getenv('WORKSPACE'));
	}

    public function testClient()
    {
        $response = $this->client->sendMessage(['input' => ['text' => 'Hello']]);

        $content = json_decode($response->getBody()->getContents());

        $this->assertEquals('Hello. Good evening', $content->output->generic[0]->text);
    }
}
