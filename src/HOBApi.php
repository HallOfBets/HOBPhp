<?php
namespace HOB\SDK;

use HOB\SDK\Api\Betting;
use HOB\SDK\Api\Helper\ApiClient;
use HOB\SDK\Api\WarehouseBetting;
use HOB\SDK\Exception\CoreException;

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
     * @var WarehouseBetting
     */
    public $warehousebetting;

    /**
     * @var Betting
     */
    public $betting;


    /**
     * HOBApi constructor.
     * @param $apiKey
     * @param $endpoint
     * @param string $basepath
     * @param array $guzzleOptions
     */
    public function __construct($apiKey, $endpoint, $basepath = '', array $guzzleOptions = [])
    {
        // Check system requirements for SDK
        $this->checkRequirements();

        // Create API client
        $this->setApiClient($endpoint, $basepath, $guzzleOptions);

        // Set API authentication
        $this->setApiAuth($apiKey);

        // Add services
        $this->warehousebetting     = new WarehouseBetting($this->apiClient);
        $this->betting              = new Betting($this->apiClient);
    }

    protected function setApiAuth($apiKey)
    {
        /**
         * @todo retrieve an access token and add in client header
         */
    }

    /**
     * @param $endpoint
     * @param string $basepath
     * @param array $guzzleOptions
     */
    protected function setApiClient($endpoint, $basepath, array $guzzleOptions)
    {
        $apiEndpoint = "http://{$endpoint}";

        $client = new ApiClient([
            'endpoint'      => $apiEndpoint,
            'basepath'      => $basepath,
            'guzzleOptions' => $guzzleOptions
        ]);

        $this->apiClient = $client;
    }

    /**
     * Checks for all dependencies of SDK or API.
     *
     * @throws CoreException If CURL extension is not found.
     * @throws CoreException If JSON extension is not found.
     */
    final public function checkRequirements()
    {
        if (!function_exists('curl_version')) {
//            throw new CoreException('CURL extension is needed to use HOB SDK. Not found.');
        }

        if (!function_exists('json_decode')) {
            throw new CoreException('JSON extension is needed to use HOB SDK. Not found.');
        }
    }
}
