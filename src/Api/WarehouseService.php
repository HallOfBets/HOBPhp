<?php
namespace HOB\SDK\Api;

use HOB\SDK\Api\Helper\ApiClient;
use HOB\SDK\Api\Warehouse\CompetitorsResource;
use HOB\SDK\Api\Warehouse\MatchesResource;
use HOB\SDK\Api\Warehouse\PlayersResource;
use HOB\SDK\Api\Warehouse\SportsResource;
use HOB\SDK\Api\Warehouse\TeamsResource;
use HOB\SDK\Api\Warehouse\TournamentsResource;
use HOB\SDK\Model\ServiceInterface;

/**
 * Class Warehouse
 * @package HOB\SDK\Api
 */
class WarehouseService implements ServiceInterface
{
    /**
     * @var string
     */
    protected $servicePrefix = '/warehouse';

    /**
     * @var CompetitorsResource
     */
    public $competitors;

    /**
     * @var SportsResource
     */
    public $sports;

    /**
     * @var TournamentsResource
     */
    public $tournaments;

    /**
     * @var MatchesResource
     */
    public $matches;

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
        $this->competitors      = new CompetitorsResource($apiClient, $this->servicePrefix, '/competitors');
        $this->sports           = new SportsResource($apiClient, $this->servicePrefix, '/sports');
        $this->tournaments      = new TournamentsResource($apiClient, $this->servicePrefix, '/tournaments');
        $this->matches          = new MatchesResource($apiClient, $this->servicePrefix, '/matches');
        $this->teams            = new TeamsResource($apiClient, $this->servicePrefix, '/teams');
        $this->players          = new PlayersResource($apiClient, $this->servicePrefix, '/players');
    }
}
