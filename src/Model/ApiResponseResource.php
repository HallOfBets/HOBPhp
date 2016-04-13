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
        $totalItems     = $response->getHeader('X-Pagination-Count');
        $currentPage    = $response->getHeader('X-Pagination-Current');
        $totalPages     = $response->getHeader('X-Pagination-Pages');

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
