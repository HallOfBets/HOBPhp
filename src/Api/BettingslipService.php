<?php
namespace HOB\SDK\Api;

use HOB\SDK\Api\Betting\BetsResource;
use HOB\SDK\Api\Bettingslip\BettingslipsResource;
use HOB\SDK\Api\Bettingslip\StakesResource;
use HOB\SDK\Api\Helper\ApiClient;
use HOB\SDK\Model\ServiceInterface;

/**
 * Class BettingslipService
 * @package HOB\SDK\Api
 */
class BettingslipService implements ServiceInterface
{
    /**
     * @var string
     */
    protected $servicePrefix = '/bettingslip';

    /**
     * @var BetsResource
     */
    public $bettingslips;

    /**
     * @var StakesResource
     */
    public $stakes;

    /**
     * BettingslipService constructor.
     *
     * @param ApiClient $apiClient
     */
    public function __construct(ApiClient $apiClient)
    {
        $this->bettingslips     = new BettingslipsResource($apiClient, $this->servicePrefix, '/bettingslips');
        $this->stakes           = new StakesResource($apiClient, $this->servicePrefix, '/stakes');
    }
}
