<?php
namespace HOB\SDK\Api;

use HOB\SDK\Api\Betting\BetsResource;
use HOB\SDK\Api\Helper\ApiClient;
use HOB\SDK\Model\ServiceInterface;

/**
 * Class BettingService
 * @package HOB\SDK\Api
 */
class BettingService implements ServiceInterface
{
    /**
     * @var string
     */
    protected $servicePrefix = '/betting';

    /**
     * @var BetsResource
     */
    public $bets;

    /**
     * WarehouseService constructor.
     * @param ApiClient $apiClient
     */
    public function __construct(ApiClient $apiClient)
    {
        $this->bets             = new BetsResource($apiClient, $this->servicePrefix, '/bets');
    }
}
