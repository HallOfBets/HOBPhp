<?php
namespace HOB\SDK\Model;

use Doctrine\ORM\NonUniqueResultException;

/**
 * Interface ResourceInterface
 * @package HOB\SDK\Api
 */
interface ResourceInterface
{
    /**
     * @param array $params
     * @return \HOB\SDK\Model\HOBApiResult
     */
    public function create(array $params = []);

    /**
     * @param array $params
     * @return \HOB\SDK\Model\HOBApiResult
     * @throws NonUniqueResultException
     */
    public function findOneBy(array $params = []);

    /**
     * @param array $params
     * @return \HOB\SDK\Model\HOBApiResult
     */
    public function findBy(array $params = []);

    /**
     * @param integer $id
     * @return \HOB\SDK\Model\HOBApiResult
     */
    public function find($id);

    /**
     * @param integer $id
     * @param array $params
     * @return \HOB\SDK\Model\HOBApiResult
     */
    public function update($id, array $params = []);

    /**
     * @param integer $id
     * @return \HOB\SDK\Model\HOBApiResult
     */
    public function delete($id);
}
