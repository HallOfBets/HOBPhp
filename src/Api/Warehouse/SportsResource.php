<?php
namespace HOB\SDK\Api\Warehouse;

use HOB\SDK\Api\GenericResource;
use HOB\SDK\Exception\NotImplementedException;

/**
 * Class SportsResource
 * @package HOB\SDK\Api\Warehouse
 */
class SportsResource extends GenericResource
{
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
