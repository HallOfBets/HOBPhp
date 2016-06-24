<?php
namespace HOB\SDK;

use HOB\SDK\Api\BetsService;
use HOB\SDK\Api\BettingService;
use HOB\SDK\Api\BettingslipService;
use HOB\SDK\Api\ContactService;
use HOB\SDK\Api\Helper\ApiClient;
use HOB\SDK\Api\IAMService;
use HOB\SDK\Api\StreamService;
use HOB\SDK\Api\WalletService;
use HOB\SDK\Api\WarehouseService;
use HOB\SDK\Api\WarehouseStatsService;
use HOB\SDK\Exception\HOBException;

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
     * @var IAMService
     */
    public $iam;

    /**
     * @var WarehouseService
     */
    public $warehouse;

    /**
     * @var WarehouseStatsService
     */
    public $warehouseStats;

    /**
     * @var BettingService
     */
    public $betting;

    /**
     * @var BetsService
     */
    public $bets;

    /**
     * @var ContactService
     */
    public $contact;

    /**
     * @var BettingslipService
     */
    public $bettingslip;

    /**
     * @var WalletService
     */
    public $wallet;

    /**
     * @var StreamService
     */
    public $stream;


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
        $this->setApiClient($endpoint, $basepath, $apiKey, $guzzleOptions);

        // Add services
        $this->iam                  = new IAMService($this->apiClient);
        $this->warehouse            = new WarehouseService($this->apiClient);
        $this->warehouseStats       = new WarehouseStatsService($this->apiClient);
        $this->betting              = new BettingService($this->apiClient);
        $this->bets                 = new BetsService($this->apiClient);
        $this->contact              = new ContactService($this->apiClient);
        $this->bettingslip          = new BettingslipService($this->apiClient);
        $this->wallet               = new WalletService($this->apiClient);
        $this->stream               = new StreamService($this->apiClient);
    }

    /**
     * @param $endpoint
     * @param string $basepath
     * @param array $guzzleOptions
     */
    protected function setApiClient($endpoint, $basepath, $apiKey, array $guzzleOptions)
    {
        $apiEndpoint = "http://{$endpoint}";

        $client = new ApiClient([
            'endpoint'      => $apiEndpoint,
            'basepath'      => $basepath,
            'guzzleOptions' => $guzzleOptions,
        ]);

        $client->setAuthorizationHeader($apiKey);

        $this->apiClient = $client;
    }

    /**
     * @param $apiKey
     *
     * @throws HOBException
     */
    public function setAipKey($apiKey)
    {
        $this->apiClient->setAuthorizationHeader($apiKey);
    }

    /**
     * Checks for all dependencies of SDK or API.
     *
     * @throws HOBException If CURL extension is not found.
     * @throws HOBException If JSON extension is not found.
     */
    final public function checkRequirements()
    {
        if (!function_exists('curl_version')) {
//            throw new CoreException('CURL extension is needed to use HOB SDK. Not found.');
        }

        if (!function_exists('json_decode')) {
            throw new HOBException('JSON extension is needed to use HOB SDK. Not found.');
        }
    }
}
