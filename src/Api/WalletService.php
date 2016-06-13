<?php
namespace HOB\SDK\Api;

use HOB\SDK\Api\Helper\ApiClient;
use HOB\SDK\Api\Wallet\WalletsResource;
use HOB\SDK\Model\ServiceInterface;

/**
 * Class WalletService
 * @package HOB\SDK\Api
 */
class WalletService implements ServiceInterface
{
    /**
     * @var string
     */
    protected $servicePrefix = '/wallet';

    /**
     * @var WalletsResource
     */
    public $wallets;

    /**
     * WalletService constructor.
     * @param ApiClient $apiClient
     */
    public function __construct(ApiClient $apiClient)
    {
        $this->wallets      = new WalletsResource($apiClient, $this->servicePrefix, '/wallets');
    }
}
