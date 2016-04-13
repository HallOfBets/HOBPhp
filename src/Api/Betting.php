<?php
namespace HOB\SDK\Api;

/**
 * Class Betting
 * @package HOB\SDK\Api
 */
class Betting extends GenericResource
{
    /**
     * @var string
     */
    protected $servicePrefix = '/betting';


    /**
     * @param array $params
     * @return \HOB\SDK\Model\ApiResource
     */
    public function getBets(array $params = [])
    {
        $response = $this->getApiClient()->get($this->servicePrefix.'/bets', $params);

        return $this->createResource($response);
    }

    /**
     * @param $betId
     * @param array $params
     * @return \HOB\SDK\Model\ApiResource
     */
    public function getSport($betId, array $params = [])
    {
        $response = $this->getApiClient()->get($this->servicePrefix.'/bets/'. (int) $betId, $params);

        return $this->createResource($response);
    }
}
