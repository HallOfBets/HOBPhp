<?php
namespace HOB\SDK\Api\Warehouse;

use HOB\SDK\Api\GenericResource;
use HOB\SDK\Exception\NotImplementedException;

/**
 * Class TeamsResource
 * @package HOB\SDK\Api\Warehouse
 */
class TeamsResource extends GenericResource
{
    /**
     * @inheritdoc
     */
    public function create(array $params = [])
    {
        return $this->call('POST', '/sports/'. (int) $params['sport'] . $this->resourcePrefix, $params);
    }


    /**
     * @inheritdoc
     */
    public function addPlayer(array $params = [])
    {
        return $this->call('POST', $this->resourcePrefix .'/'. (int) $params['team'] .'/players', $params);
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
