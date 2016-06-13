<?php
namespace HOB\SDK\Api\Wallet;

use HOB\SDK\Api\GenericResource;
use HOB\SDK\Exception\MissingParameterException;
use HOB\SDK\Exception\NotImplementedException;

/**
 * Class WalletsResource
 * @package HOB\SDK\Api\Wallet
 */
class WalletsResource extends GenericResource
{
    /**
     * Find wallet transactions
     * @param array $params
     *
     * @return \HOB\SDK\Model\HOBApiResult
     * @throws MissingParameterException
     */
    public function findWalletTransactionsBy(array $params = [])
    {
        if(!isset($params['wallet'])) {
            throw new MissingParameterException(sprintf("Missing parameter '%s' in method call '%s' of class '%s'", 'wallet', __FUNCTION__, get_class($this)));
        }

        return $this->call('GET', $this->resourcePrefix.'/'.$params['wallet'].'/transactions', $params);
    }

    /**
     * Find a wallet transaction
     * @param array $params
     *
     * @return \HOB\SDK\Model\HOBApiResult
     * @throws MissingParameterException
     */
    public function findWalletTransactionBy(array $params = [])
    {
        if(!isset($params['wallet'])) {
            throw new MissingParameterException(sprintf("Missing parameter '%s' in method call '%s' of class '%s'", 'wallet', __FUNCTION__, get_class($this)));
        }

        if(!isset($params['transaction'])) {
            throw new MissingParameterException(sprintf("Missing parameter '%s' in method call '%s' of class '%s'", 'transaction', __FUNCTION__, get_class($this)));
        }

        return $this->call('GET', $this->resourcePrefix.'/'.$params['wallet'].'/transactions/'.$params['transaction'], $params);
    }

    /**
     * @inheritdoc
     */
    public function update($id, array $params = [])
    {
        throw new NotImplementedException(sprintf("Method '%s of resource '%s' not implemented", __FUNCTION__, get_class($this)));
    }

    /**
     * @inheritdoc
     */
    public function delete($id)
    {
        throw new NotImplementedException(sprintf("Method '%s of resource '%s' not implemented", __FUNCTION__, get_class($this)));
    }
}
