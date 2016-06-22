<?php
namespace HOB\SDK\Api;

use Doctrine\ORM\NonUniqueResultException;
use HOB\SDK\Api\Helper\ApiClient;
use HOB\SDK\Model\HOBApiResult;
use HOB\SDK\Model\ResourceInterface;

/**
 * Class GenericResource
 * @package HOB\SDK\Api
 */
abstract class GenericResource implements ResourceInterface
{
    /**
     * @var ApiClient
     */
    protected $apiClient;

    /**
     * @var string
     */
    protected $servicePrefix;

    /**
     * @var string
     */
    protected $resourcePrefix;


    /**
     * GenericResource constructor.
     * @param ApiClient $apiClient
     * @param string $servicePrefix
     * @param string $resourcePrefix
     */
    public function __construct(ApiClient $apiClient, $servicePrefix = '', $resourcePrefix = '')
    {
        $this->apiClient        = $apiClient;
        $this->servicePrefix    = $servicePrefix;
        $this->resourcePrefix   = $resourcePrefix;
    }

    /**
     * @return ApiClient
     */
    public function getApiClient()
    {
        return $this->apiClient;
    }

    /**
     * @param $method
     * @param $path
     * @param array $data
     * @return HOBApiResult
     */
    protected function call($method, $path, array $data = [])
    {
        $response   = $this->getApiClient()->call($method, $this->servicePrefix.$path, $data);

        return new HOBApiResult($response);
    }

    /**
     * @inheritdoc
     */
    public function create(array $params = [])
    {
        return $this->call('POST', $this->resourcePrefix, $params);
    }

    /**
     * @inheritdoc
     */
    public function findOneBy(array $params = [])
    {
        $HOBApiResult = $this->call('GET', $this->resourcePrefix, $params);

        if($HOBApiResult->getTotalItems() != 1) {
            return null;
        }

        $HOBApiResult->setUniqResult();

        return $HOBApiResult;
    }

    /**
     * @inheritdoc
     */
    public function findBy(array $params = [])
    {
        return $this->call('GET', $this->resourcePrefix, $params);
    }

    /**
     * @inheritdoc
     */
    public function find($id)
    {
        return $this->call('GET', $this->resourcePrefix.'/'. $id);

    }

    /**
     * @inheritdoc
     */
    public function update($id, array $params = [])
    {
        return $this->call('PATCH', $this->resourcePrefix.'/'. $id, $params);
    }

    /**
     * @inheritdoc
     */
    public function delete($id)
    {
        return $this->call('DELETE', $this->resourcePrefix.'/'. $id);
    }
}
