<?php
namespace HOB\SDK\Api\Helper;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

/**
 * Class GuzzleClient
 * @package HOB\SDK\Api\Helper
 */
class GuzzleClient
{


    /**
     * GuzzleClient constructor.
     * @param array $guzzleOptions
     */
    public function __construct(array $guzzleOptions = [])
    {
        $this->client = new Client($guzzleOptions);
    }

    /**
     * @param $url
     * @param array $parameters
     * @param array $headers
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function get($url, array $parameters = [], array $headers = [])
    {
        $request    = new Request('GET', $url, $headers);
        $response   = $this->client->send($request, ['query' => $parameters]);

        return $response;
    }

    /**
     * @param $url
     * @param array $parameters
     * @param array $headers
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function post($url, array $parameters = [], array $headers = [])
    {
        $request    = new Request('POST', $url, $headers);
        $response   = $this->client->send($request, ['json' => $parameters]);

        return $response;
    }
}
