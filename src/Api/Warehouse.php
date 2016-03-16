<?php
namespace HOB\SDK\Api;

/**
 * Class Warehouse
 * @package HOB\SDK\Api
 */
class Warehouse extends GenericResource
{
    /**
     * @param array $params
     * @return array
     */
    public function getSports(array $params = [])
    {
        $response = $this->getApiClient()->get('/sports');

        return json_decode($response->getBody()->getContents(), true);
    }
}
