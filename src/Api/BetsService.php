<?php
namespace HOB\SDK\Api;

use HOB\SDK\Api\Bets\BetsResource;
use HOB\SDK\Api\Bets\SportsResource;
use HOB\SDK\Api\Helper\ApiClient;
use HOB\SDK\Model\ServiceInterface;

/**
 * Class BetsService
 * @package HOB\SDK\Api
 */
class BetsService implements ServiceInterface
{
    /**
     * @var string
     */
    protected $servicePrefix = '/bets';

    /**
     * @var BetsResource
     */
    public $bets;

    /**
     * @var SportsResource
     */
    public $sports;

    /**
     * WarehouseService constructor.
     * @param ApiClient $apiClient
     */
    public function __construct(ApiClient $apiClient)
    {
        $this->bets             = new BetsResource($apiClient, $this->servicePrefix, '/bets');
        $this->sports           = new SportsResource($apiClient, $this->servicePrefix, '/sports');
    }
}
