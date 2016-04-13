<?php
namespace HOB\SDK\Api;

/**
 * Class WarehouseBetting
 * @package HOB\SDK\Api
 */
class WarehouseBetting extends GenericResource
{
    /**
     * @var string
     */
    protected $servicePrefix = '/warehousebetting';

    /**
     * @param array $params
     * @return \HOB\SDK\Model\ApiResource
     */
    public function getWarehouseBets(array $params = [])
    {
        $response = $this->getApiClient()->get($this->servicePrefix.'/warehousebets', $params);

        return $this->createResource($response);
    }

    /**
     * @param $warehousebetId
     * @param array $params
     * @return \HOB\SDK\Model\ApiResource
     */
    public function getWarehouseBet($warehousebetId, array $params = [])
    {
        $response = $this->getApiClient()->get($this->servicePrefix.'/warehousebets/'. (int) $warehousebetId, $params);

        return $this->createResource($response);
    }
}
