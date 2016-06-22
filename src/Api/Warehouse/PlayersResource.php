<?php
namespace HOB\SDK\Api\Warehouse;

use HOB\SDK\Api\GenericResource;
use HOB\SDK\Exception\NotImplementedException;

/**
 * Class PlayersResource
 * @package HOB\SDK\Api\Warehouse
 */
class PlayersResource extends GenericResource
{
    /**
     * @inheritdoc
     */
    public function create(array $params = [])
    {
        return $this->call('POST', '/sports/'. $params['sport'] . $this->resourcePrefix, $params);
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
