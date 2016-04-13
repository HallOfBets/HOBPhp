<?php
namespace HOB\SDK\Model;
use Psr\Http\Message\ResponseInterface;

/**
 * Class ApiResource
 * @package HOB\SDK\Model
 */
class ApiResource
{
    /**
     * @var mixed
     */
    private $data;

    /**
     * @var integer
     */
    private $paginationCurrent;

    /**
     * @var integer
     */
    private $paginationCount;

    /**
     * @var integer
     */
    private $paginationPages;


    /**
     * ApiResource constructor.
     * @param ResponseInterface $response
     */
    public function __construct(ResponseInterface $response)
    {
        // Set data
        $this->data = json_decode($response->getBody()->getContents(), true);

        // Set pagination
        $current = $response->getHeader("X-Pagination-Current");
        $current = is_array($current) ? current($current) : $current;
        $this->paginationCurrent   = $current;

        $count = $response->getHeader("X-Pagination-Count");
        $count = is_array($count) ? current($count) : $count;
        $this->paginationCount   = $count;

        $pages = $response->getHeader("X-Pagination-Pages");
        $pages = is_array($pages) ? current($pages) : $pages;
        $this->paginationPages   = $pages;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @return int
     */
    public function getPaginationCurrent()
    {
        return $this->paginationCurrent;
    }

    /**
     * @return int
     */
    public function getPaginationCount()
    {
        return $this->paginationCount;
    }

    /**
     * @return int
     */
    public function getPaginationPages()
    {
        return $this->paginationPages;
    }
}
