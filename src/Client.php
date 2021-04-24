<?php


namespace Yosodog\PWTools;


/**
 * Class Client
 *
 * @package Yosodog\PWTools
 */
class Client
{
    /**
     * @var string
     */
    protected string $apiKey;

    /**
     * @var string
     */
    public string $baseURL = "https://politicsandwar.com/api/";

    /**
     * @var \GuzzleHttp\Client
     */
    public \GuzzleHttp\Client $client;

    /**
     * Client constructor.
     *
     * @param string $apiKey
     */
    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;

        $this->client = new \GuzzleHttp\Client([
           "verify" => false,
           "cookies" => true,
           "base_uri" => $this->baseURL,
       ]);
    }
}