<?php
namespace HOB\SDK\Api\Stream;

use HOB\SDK\Api\GenericResource;
use HOB\SDK\Exception\NotImplementedException;

/**
 * Class StreamsResource
 * @package HOB\SDK\Api\Warehouse
 */
class StreamsResource extends GenericResource
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
