<?php
namespace HOB\SDK\Api;

/**
 * Class Bookmaker
 * @package HOB\SDK\Api
 */
class Bookmaker extends GenericResource
{
    /**
     * @var string
     */
    protected $servicePrefix = '/bookmaker';


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
    public function getBet($betId, array $params = [])
    {
        $response = $this->getApiClient()->get($this->servicePrefix.'/bets/'. (int) $betId, $params);

        return $this->createResource($response);
    }

    /**
     * @param array $params
     * @return \HOB\SDK\Model\ApiResource
     */
    public function findBet(array $params = [])
    {
        $response = $this->getBets($params);
        $response->setUniqueResult();

        return $response;
    }

    /**
     * @param array $params
     * @param array $forcasts
     * @return \HOB\SDK\Model\ApiResponseResource
     */
    public function createBet(array $params = [], array $forcasts)
    {
        $params['forcasts'] = $forcasts;
        $response = $this->getApiClient()->post($this->servicePrefix.'/bets', $params);

        return $this->createResource($response);
    }

    /**
     * @param $betId
     * @param array $outcomes
     * @return \HOB\SDK\Model\ApiResponseResource
     */
    public function unwindBet($betId, array $outcomes)
    {
        $params = ['outcomes' => $outcomes];
        $response = $this->getApiClient()->post($this->servicePrefix.'/bets/'. (int) $betId .'/unwind', $params);

        return $this->createResource($response);
    }
}
