<?php
namespace HOB\SDK\Api;

use HOB\SDK\Api\IAM\AuthResource;
use HOB\SDK\Api\IAM\UsersResource;
use HOB\SDK\Api\Helper\ApiClient;
use HOB\SDK\Model\ServiceInterface;

/**
 * Class IAMService
 * @package HOB\SDK\Api
 */
class IAMService implements ServiceInterface
{
    /**
     * @var string
     */
    protected $servicePrefix = '/iam';

    /**
     * @var AuthResource
     */
    public $auth;

    /**
     * @var UsersResource
     */
    public $users;

    /**
     * IAMService constructor.
     *
     * @param ApiClient $apiClient
     */
    public function __construct(ApiClient $apiClient)
    {
        $this->auth             = new AuthResource($apiClient, $this->servicePrefix, '/auth');
        $this->users            = new UsersResource($apiClient, $this->servicePrefix, '/users');
    }
}
