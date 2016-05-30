<?php
namespace HOB\SDK\Api\Betting;

use HOB\SDK\Api\GenericResource;
use HOB\SDK\Exception\NotImplementedException;

/**
 * Class BetsResource
 * @package HOB\SDK\Api\Warehouse
 */
class BetsResource extends GenericResource
{
    /**
     * @param array $params
     * @return \HOB\SDK\Model\HOBApiResult
     */
    public function unwind(array $params)
    {
        $url = sprintf("%s/%d/unwind", $this->resourcePrefix, (int) $params['bet']);

        return $this->call('POST', $url, $params);
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
