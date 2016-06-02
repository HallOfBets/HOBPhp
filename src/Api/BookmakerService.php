<?php
namespace HOB\SDK\Api;

use HOB\SDK\Api\Bookmaker\BetsResource;
use HOB\SDK\Api\Helper\ApiClient;
use HOB\SDK\Model\ServiceInterface;

/**
 * Class BookmakerService
 * @package HOB\SDK\Api
 */
class BookmakerService implements ServiceInterface
{
    /**
     * @var string
     */
    protected $servicePrefix = '/bookmaker';

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
