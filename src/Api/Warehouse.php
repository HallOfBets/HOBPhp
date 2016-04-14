<?php
namespace HOB\SDK\Api;

/**
 * Class Warehouse
 * @package HOB\SDK\Api
 */
class Warehouse extends GenericResource
{
    /**
     * @var string
     */
    protected $servicePrefix = '/warehouse';


    /**
     * @param array $params
     * @return \HOB\SDK\Model\ApiResource
     */
    public function getSports(array $params = [])
    {
        $response = $this->getApiClient()->get($this->servicePrefix.'/sports', $params);

        return $this->createResource($response);
    }

    /**
     * @param $sportId
     * @param array $params
     * @return \HOB\SDK\Model\ApiResource
     */
    public function getSport($sportId, array $params = [])
    {
        $response = $this->getApiClient()->get($this->servicePrefix.'/sports/'. (int) $sportId, $params);

        return $this->createResource($response);
    }

    /**
     * @param array $params
     * @return \HOB\SDK\Model\ApiResource
     */
    public function getTournaments(array $params = [])
    {
        $response = $this->getApiClient()->get($this->servicePrefix.'/tournaments', $params);

        return $this->createResource($response);
    }

    /**
     * @param $tournamentId
     * @param array $params
     * @return \HOB\SDK\Model\ApiResource
     */
    public function getTournament($tournamentId, array $params = [])
    {
        $response = $this->getApiClient()->get($this->servicePrefix.'/tournaments/'. (int) $tournamentId, $params);

        return $this->createResource($response);
    }

    /**
     * @param array $params
     * @return \HOB\SDK\Model\ApiResource
     */
    public function getMatches(array $params = [])
    {
        $response = $this->getApiClient()->get($this->servicePrefix.'/matches', $params);

        return $this->createResource($response);
    }

    /**
     * @param $matchId
     * @param array $params
     * @return \HOB\SDK\Model\ApiResource
     */
    public function getMatch($matchId, array $params = [])
    {
        $response = $this->getApiClient()->get($this->servicePrefix.'/matches/'. (int) $matchId, $params);

        return $this->createResource($response);
    }

    /**
     * @param array $params
     * @return \HOB\SDK\Model\ApiResource
     */
    public function getTeams(array $params = [])
    {
        $response = $this->getApiClient()->get($this->servicePrefix.'/teams', $params);

        return $this->createResource($response);
    }

    /**
     * @param $teamId
     * @param array $params
     * @return \HOB\SDK\Model\ApiResource
     */
    public function getTeam($teamId, array $params = [])
    {
        $response = $this->getApiClient()->get($this->servicePrefix.'/teams/'. (int) $teamId, $params);

        return $this->createResource($response);
    }
}
