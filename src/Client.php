<?php

namespace Railken\Ibm\Assistant;

class Client
{
	protected $url;
	protected $key;
	protected $workspace;

	public function __construct(string $url, string $key, string $workspace)
	{
		$this->url = $url;
		$this->key = $key;
		$this->workspace = $workspace;
		$this->client = new \GuzzleHttp\Client([
			'base_uri' => $url,
			'auth' => ['apikey', $key]
		]);
	}

	public function sendMessage(array $params)
	{
		return $this->client->post('/assistant/api/v1/workspaces/'.$this->workspace."/message?version=2019-02-28", [
			'json' => $params
		]);
	}
}