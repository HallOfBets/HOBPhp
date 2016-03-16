<?php
namespace HOB\SDK\Api;

use HOB\SDK\Api\Helper\ApiClient;
use HOB\SDK\Model\ApiResource;
use Psr\Http\Message\ResponseInterface;

/**
 * Class GenericResource
 * @package HOB\SDK\Api
 */
abstract class GenericResource
{
    /**
     * @var ApiClient
     */
    protected $apiClient;


    /**
     * GenericResource constructor.
     * @param ApiClient $apiClient
     */
    public function __construct(ApiClient $apiClient)
    {
        $this->apiClient = $apiClient;
    }

    /**
     * @return ApiClient
     */
    public function getApiClient()
    {
        return $this->apiClient;
    }

    /**
     * @param ResponseInterface $response
     * @return ApiResource
     */
    public function createResource(ResponseInterface $response)
    {
        $resource = new ApiResource($response);

        return $resource;
    }
}
