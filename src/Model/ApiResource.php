<?php
namespace HOB\SDK\Model;

/**
 * Class ApiResource
 * @package HOB\SDK\Model
 */
class ApiResource
{
    /**
     * @var mixed
     */
    private $content;

    /**
     * @var integer
     */
    protected $totalItems;

    /**
     * @var integer
     */
    protected $currentPage;

    /**
     * @var integer
     */
    protected $totalPages;


    /**
     * ApiResource constructor.
     * @param $content
     * @param null $totalItems
     * @param null $currentPage
     * @param null $totalPages
     */
    public function __construct($content, $totalItems = null, $currentPage = null, $totalPages = null)
    {
        $this->content      = $content;
        $this->totalItems   = $totalItems;
        $this->currentPage  = $currentPage;
        $this->totalPages   = $totalPages;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @return int
     */
    public function getTotalItems()
    {
        return $this->totalItems;
    }

    /**
     * @return int
     */
    public function getCurrentPage()
    {
        return $this->currentPage;
    }

    /**
     * @return int
     */
    public function getTotalPages()
    {
        return $this->totalPages;
    }
}
