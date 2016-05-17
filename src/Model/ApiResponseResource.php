<?php
namespace HOB\SDK\Model;

use Psr\Http\Message\ResponseInterface;
use Symfony\Component\HttpFoundation\Response;

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
        $content        = $this->extractContentFromResponse($response);
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

    /**
     * @param ResponseInterface $response
     * @return array
     */
    protected function extractContentFromResponse(ResponseInterface $response)
    {
        switch($response->getStatusCode()) {
            case Response::HTTP_NOT_FOUND:
                $content = [];
                break;
            default:
                $content = json_decode($response->getBody()->getContents(), true);
        }

        return $content;
    }
}
