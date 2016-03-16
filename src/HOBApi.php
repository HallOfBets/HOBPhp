<?php
namespace HOB\SDK;

use HOB\SDK\Api\Helper\ApiClient;

/**
 * Class HOBApi
 * @package HOB\SDK
 */
class HOBApi
{
    /**
     * @var ApiClient
     */
    private $apiClient;


    /**
     * HOBApi constructor.
     * @param $endpoint
     * @param array $guzzleOptions
     */
    public function __construct($endpoint, array $guzzleOptions = [])
    {
        $this->setApiClient($endpoint, $guzzleOptions);
    }

    /**
     * @param $endpoint
     * @param array $guzzleOptions
     */
    protected function setApiClient($endpoint, array $guzzleOptions = [])
    {
        $apiEndpoint = "https://{$endpoint}";

        $client = new ApiClient([
            'endpoint'      => $apiEndpoint,
            'guzzleOptions' => $guzzleOptions
        ]);

        $this->apiClient = $client;
    }
}
