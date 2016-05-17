<?php
namespace HOB\SDK\Model;

/**
 * Class ApiResource
 * @package HOB\SDK\Model
 */
class ApiResource implements \Iterator
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
     * @var int
     */
    private $position = 0;


    /**
     * ApiResource constructor.
     * @param $content
     * @param null $totalItems
     * @param null $currentPage
     * @param null $totalPages
     */
    public function __construct(array $content, $totalItems = null, $currentPage = null, $totalPages = null)
    {
        $this->content      = $content;
        $this->totalItems   = (int) $totalItems;
        $this->currentPage  = (int) $currentPage;
        $this->totalPages   = (int) $totalPages;
        $this->position     = 0;
    }

    /**
     * @return array
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

    /**
     * @inheritdoc
     */
    public function rewind()
    {
        $this->position = 0;
    }

    /**
     * @inheritdoc
     */
    public function current()
    {
        return $this->content[$this->position];
    }

    /**
     * @inheritdoc
     */
    public function key()
    {
        return $this->position;
    }

    /**
     * @inheritdoc
     */
    public function next()
    {
        ++$this->position;
    }

    /**
     * @inheritdoc
     */
    public function valid()
    {
        return isset($this->content[$this->position]);
    }

    /**
     * @return integer
     */
    public function countContent()
    {
        return count($this->content);
    }

    /**
     * Set unique result
     */
    public function setUniqueResult()
    {
        if($this->getTotalItems() !== 1) {
            $this->content      = [];
            $this->totalItems   = 0;
            $this->totalPages   = 1;
            $this->currentPage  = 1;

            return;
        }
        
        $this->content = current($this->content);
    }
}
