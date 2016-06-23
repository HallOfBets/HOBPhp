<?php
namespace HOB\SDK\Api\IAM;

use HOB\SDK\Api\GenericResource;
use HOB\SDK\Exception\NotImplementedException;

/**
 * Class AuthResource
 * @package HOB\SDK\Api\IAM
 */
class AuthResource extends GenericResource
{
    /**
     * IAM Register
     *
     * @param array $params
     *
     * @return \HOB\SDK\Model\HOBApiResult
     */
    public function register(array $params = [])
    {
        return $this->call('POST', $this->resourcePrefix.'/auth/register', $params);
    }

    /**
     * IAM Login
     * 
     * @param array $params
     *
     * @return \HOB\SDK\Model\HOBApiResult
     */
    public function login(array $params = [])
    {
        return $this->call('POST', $this->resourcePrefix.'/auth/login', $params);
    }

    /**
     * @inheritdoc
     */
    public function create(array $params = [])
    {
        throw new NotImplementedException(sprintf("Method '%s of resource '%s' not implemented", __FUNCTION__, get_class($this)));
    }

    /**
     * @inheritdoc
     */
    public function findOneBy(array $params = [])
    {
        throw new NotImplementedException(sprintf("Method '%s of resource '%s' not implemented", __FUNCTION__, get_class($this)));
    }

    /**
     * @inheritdoc
     */
    public function findBy(array $params = [])
    {
        throw new NotImplementedException(sprintf("Method '%s of resource '%s' not implemented", __FUNCTION__, get_class($this)));
    }

    /**
     * @inheritdoc
     */
    public function find($id)
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
    
    /**
     * @inheritdoc
     */
    public function update($id, array $params = [])
    {
        throw new NotImplementedException(sprintf("Method '%s of resource '%s' not implemented", __FUNCTION__, get_class($this)));
    }
}
