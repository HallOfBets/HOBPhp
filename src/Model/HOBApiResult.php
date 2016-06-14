<?php
namespace HOB\SDK\Model;

use Psr\Http\Message\ResponseInterface;

/**
 * Class HOBApiResult
 * @package HOB\SDK\Model
 */
class HOBApiResult
{
    /**
     * @var ResponseInterface
     */
    protected $response;

    /**
     * @var mixed
     */
    protected $body;

    /**
     * ApiResponseResource constructor.
     * @param ResponseInterface $response
     */
    public function __construct(ResponseInterface $response)
    {
        $this->response = $response;
        $this->body     = json_decode((string) $this->response->getBody(), true);
    }

    /**
     * @param $name
     * @param null $default
     * @return mixed|null
     */
    public function getHeader($name, $default = null)
    {
        if(!$this->response->hasHeader($name)) {
            return $default;
        }

        $header = $this->response->getHeader($name);
        $header = is_array($header) ? current($header) : $header;

        return $header;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->body;
    }

    /**
     * @return integer
     */
    public function getTotalItems()
    {
        return $this->getHeader('X-Pagination-Count');
    }

    /**
     * @return int
     */
    public function getCurrentPage()
    {
        return $this->getHeader('X-Pagination-Current');
    }

    /**
     * @return int
     */
    public function getTotalPages()
    {
        return $this->getHeader('X-Pagination-Pages');
    }

    /**
     * Set uniq result content
     */
    public function setUniqResult()
    {
        $this->body = $this->body[0];
    }

    /**
     * @return ResponseInterface
     */
    public function getResponse()
    {
        return $this->response;
    }
}
