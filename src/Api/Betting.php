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
    protected $servicePrefix = '/betting/api';


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

    /**
     * @param array $params
     * @return \HOB\SDK\Model\ApiResource
     */
    public function getQuestions(array $params = [])
    {
        $response = $this->getApiClient()->get($this->servicePrefix.'/questions', $params);

        return $this->createResource($response);
    }

    /**
     * @param $questionId
     * @param array $params
     * @return \HOB\SDK\Model\ApiResource
     */
    public function getQuestion($questionId, array $params = [])
    {
        $response = $this->getApiClient()->get($this->servicePrefix.'/questions/'. (int) $questionId, $params);

        return $this->createResource($response);
    }
}
