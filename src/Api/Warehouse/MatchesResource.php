<?php
namespace HOB\SDK\Api\Warehouse;

use HOB\SDK\Api\GenericResource;
use HOB\SDK\Exception\NotImplementedException;

/**
 * Class MatchesResource
 * @package HOB\SDK\Api\Warehouse
 */
class MatchesResource extends GenericResource
{
    /**
     * @param array $params
     * @return \HOB\SDK\Model\HOBApiResult
     */
    public function createMatchCompetitor(array $params)
    {
        $url = sprintf("%s/%d/competitors", $this->resourcePrefix, (int) $params['match']);

        return $this->call('POST', $url, $params);
    }

    /**
     * @param array $params
     * @return \HOB\SDK\Model\HOBApiResult
     */
    public function updateMatchCompetitor(array $params)
    {
        $url = sprintf("%s/%d/competitors/%d", $this->resourcePrefix, (int) $params['match'], (int) $params['competitor']);

        return $this->call('PATCH', $url, $params);
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
