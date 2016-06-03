<?php
namespace HOB\SDK\Api;

use HOB\SDK\Api\Contact\MessagesResource;
use HOB\SDK\Api\Contact\TypesResource;
use HOB\SDK\Api\Helper\ApiClient;
use HOB\SDK\Model\ServiceInterface;

/**
 * Class ContactService
 * @package HOB\SDK\Api
 */
class ContactService implements ServiceInterface
{
    /**
     * @var string
     */
    protected $servicePrefix = '/contact';

    /**
     * @var TypesResource
     */
    public $types;

    /**
     * @var MessagesResource
     */
    public $messages;

    /**
     * WarehouseService constructor.
     * @param ApiClient $apiClient
     */
    public function __construct(ApiClient $apiClient)
    {
        $this->types             = new TypesResource($apiClient, $this->servicePrefix, '/types');
        $this->types             = new MessagesResource($apiClient, $this->servicePrefix, '/messages');
    }
}
