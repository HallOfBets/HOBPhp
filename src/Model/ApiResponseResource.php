<?php
namespace HOB\SDK\Model;

use Psr\Http\Message\ResponseInterface;

/**
 * Class ApiResponseResource
 * @package HOB\SDK\Model
 */
class ApiResponseResource extends ApiResource
{
    /**
     * ApiResponseResource constructor.
     * @param ResponseInterface $response
     */
    public function __construct(ResponseInterface $response)
    {
        $content        = json_decode($response->getBody()->getContents(), true);
        $totalItems     = $this->getHeader($response, 'X-Pagination-Count');
        $currentPage    = $this->getHeader($response, 'X-Pagination-Current');
        $totalPages     = $this->getHeader($response, 'X-Pagination-Pages');

        parent::__construct($content, $totalItems, $currentPage, $totalPages);
    }

    /**
     * @param ResponseInterface $response
     * @param $headerName
     * @return array|\string[]
     */
    protected function getHeader(ResponseInterface $response, $headerName)
    {
        $headerValue = $response->getHeader($headerName);
        $headerValue = is_array($headerValue) ? current($headerValue) : $headerValue;

        return $headerValue;
    }
}
