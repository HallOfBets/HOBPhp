<?php
namespace HOB\SDK\Api;

use HOB\SDK\Api\Stream\StreamsResource;
use HOB\SDK\Api\Helper\ApiClient;
use HOB\SDK\Model\ServiceInterface;

/**
 * Class StreamService
 * @package HOB\SDK\Api
 */
class StreamService implements ServiceInterface
{
    /**
     * @var string
     */
    protected $servicePrefix = '/stream';

    /**
     * @var StreamsResource
     */
    public $streams;

    /**
     * WarehouseService constructor.
     * @param ApiClient $apiClient
     */
    public function __construct(ApiClient $apiClient)
    {
        $this->streams             = new StreamsResource($apiClient, $this->servicePrefix, '/streams');
    }
}
