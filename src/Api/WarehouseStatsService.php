<?php
namespace HOB\SDK\Api;

use HOB\SDK\Api\Helper\ApiClient;
use HOB\SDK\Api\WarehouseStats\PlayersResource;
use HOB\SDK\Api\WarehouseStats\TeamsResource;
use HOB\SDK\Model\ServiceInterface;

/**
 * Class WarehouseStatsService
 * @package HOB\SDK\Api
 */
class WarehouseStatsService implements ServiceInterface
{
    /**
     * @var string
     */
    protected $servicePrefix = '/warehousestats';

    /**
     * @var TeamsResource
     */
    public $teams;

    /**
     * @var PlayersResource
     */
    public $players;


    /**
     * WarehouseService constructor.
     * @param ApiClient $apiClient
     */
    public function __construct(ApiClient $apiClient)
    {
        $this->teams        = new TeamsResource($apiClient, $this->servicePrefix, '/teams');
        $this->players      = new PlayersResource($apiClient, $this->servicePrefix, '/players');
    }
}
