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
     * Create sport
     * @param array $params
     * @return \HOB\SDK\Model\ApiResponseResource
     */
    public function createSport(array $params = [])
    {
        $response = $this->getApiClient()->post($this->servicePrefix.'/sports', $params);

        return $this->createResource($response);
    }

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
     * Create tournament
     * @param array $params
     * @return \HOB\SDK\Model\ApiResponseResource
     */
    public function createTournament(array $params = [])
    {
        $response = $this->getApiClient()->post($this->servicePrefix.'/tournaments', $params);

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
     * Create match
     * @param array $params
     * @return \HOB\SDK\Model\ApiResponseResource
     */
    public function createMatch(array $params = [])
    {
        $response = $this->getApiClient()->post($this->servicePrefix.'/matches', $params);

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
     * @param $matchId
     * @param $winner
     * @return \HOB\SDK\Model\ApiResponseResource
     */
    public function setMatchWinner($matchId, $winner)
    {
        $response = $this->getApiClient()->post($this->servicePrefix.'/matches/'. (int) $matchId.'/winner', ['winner' => $winner]);

        return $this->createResource($response);
    }

    /**
     * Create team
     * @param $sportId
     * @param array $params
     * @return \HOB\SDK\Model\ApiResponseResource
     */
    public function createTeam($sportId, array $params = [])
    {
        $response = $this->getApiClient()->post($this->servicePrefix.'/sports/'. (int) $sportId .'/teams', $params);

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

    /**
     * @param $matchId
     * @param $teamId
     * @param array $params
     * @return \HOB\SDK\Model\ApiResponseResource
     */
    public function setMatchTeam($matchId, $teamId, array $params = [])
    {
        $response = $this->getApiClient()->post($this->servicePrefix.'/matches/'. (int) $matchId.'/teams', array_merge($params, ['team' => (int) $teamId]));

        return $this->createResource($response);
    }

    /**
     * @param $matchId
     * @param $teamId
     * @param array $params
     * @return \HOB\SDK\Model\ApiResponseResource
     */
    public function getMatchTeam($matchId, $teamId, array $params = [])
    {
        $response = $this->getApiClient()->get($this->servicePrefix.'/matches/'. (int) $matchId.'/teams/'. (int) $teamId, $params);

        return $this->createResource($response);
    }
}
