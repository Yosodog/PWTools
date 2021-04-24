<?php


namespace Yosodog\PWTools;


use Yosodog\PWTools\API\v1\Nation;
use Yosodog\PWTools\Exceptions\PWAPIKeyExhausted;
use Yosodog\PWTools\Exceptions\PWAPIKeyInvalid;

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
    public string $baseURL = "https://politicsandwar.com/";

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

    /**
     * Our general "get" request
     *
     * @param string $url
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get(string $url): string
    {
        return $this->client->get($url)->getBody();
    }

    /**
     * This method differs from the get() method becuase it will also validate the API response
     *
     * @param string $url
     * @return \stdClass
     * @throws PWAPIKeyExhausted
     * @throws PWAPIKeyInvalid
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getAPI(string $url): \stdClass
    {
        $response = $this->get($this->buildAPIURL($url));

        $json = json_decode($response, false, JSON_THROW_ON_ERROR);

        $this->validateAPIResponse($json);

        return $json;
    }

    /**
     * Appends our key
     *
     * @param string $url
     * @return string
     */
    protected function buildAPIURL(string $url): string
    {
        return $url . "&key={$this->apiKey}";
    }

    /**
     * @param \stdClass $response
     * @return bool
     * @throws PWAPIKeyExhausted
     * @throws PWAPIKeyInvalid
     */
    protected function validateAPIResponse(\stdClass $response): bool
    {
        // The format of "success" is not always the same when true so...
        // However, we can check if "success": false is there. If it is, we know something went wrong
        // If it's not there, we can assume that the request is good
        if (isset($response->success)) // Check if it's even there
        {
            if ($response->success == false) // If the request failed, this should always be set
            {
                // The Nation and other API's return a "success" variable but the message is... "message" not "general_message"
                // But I don't really care in this instance if the nation doesn't exist so we can assume the response is good
                if (!isset($response->general_message))
                    return true;

                $this->checkIfKeyExhausted($response);
                $this->checkIfValidKey($response);
            }
        }

        return true; // If we made it this far we're gucci
    }

    /**
     * Verifies that we have not run out of API requests
     *
     * @param \stdClass $response
     * @throws PWAPIKeyExhausted
     */
    protected function checkIfKeyExhausted(\stdClass $response)
    {
        if (str_contains($response->general_message, "Exceeded"))
            throw new PWAPIKeyExhausted();
    }

    /**
     * Check if the word "invalid" is there
     *
     * @param \stdClass $response
     * @throws PWAPIKeyInvalid
     */
    protected function checkIfValidKey(\stdClass $response)
    {
        if (str_contains($response->general_message, "Invalid"))
            throw new PWAPIKeyInvalid();
    }

    /**
     * Returns a Nation instance
     *
     * @param int $nID
     * @return Nation
     */
    public function nation(int $nID): Nation
    {
        return new Nation($nID, $this);
    }

}