<?php
namespace HOB\SDK\Api\Helper;

use HOB\SDK\Api\Header\Header;
use HOB\SDK\Exception\CoreException;

/**
 * Class ApiClient
 * @package HOB\SDK\Api\Helper
 */
class ApiClient
{
    const API_VERSION = "1.0.0";

    /**
     * @var string
     */
    protected $domain;

    /**
     * @var string
     */
    protected $endpoint;

    /**
     * @var string
     */
    protected $basepath;

    /**
     * @var Header[]
     */
    protected $headers;

    /**
     * @var array
     */
    protected $guzzleOptions;

    /**
     * @var GuzzleClient
     */
    protected $client;


    /**
     * ApiClient constructor.
     * @param array $config
     */
    public function __construct(array $config)
    {
        // Check endpoint
        if(!isset($config['endpoint'])) {
            throw new CoreException("Missing 'endpoint' argument");
        }

        // Handle base path
        $this->basepath = isset($config['basepath']) ? $config['basepath'] : '';

        // Handle headers
        $this->processHeaders(isset($config['headers']) ? $config['headers'] : []);

        // Guzzle options
        $this->guzzleOptions = isset($config['guzzleOptions']) ? $config['guzzleOptions'] : [];

        // Set client
        $this->client = new GuzzleClient($config['endpoint'], $this->guzzleOptions);
    }

    /**
     * @param array $headers
     */
    protected function processHeaders(array $headers)
    {
        $this->headers = [];

        foreach($headers as $name => $header) {
            if(!$header instanceof Header) {
                $header = new Header($name, $header);
            }

            $this->addHeader($header);
        }

        $infoHeader = new InfoHeaders();
        $infoHeader->setPackage('hob-api-php', self::API_VERSION);
        $infoHeader->setEnvironment('php', phpversion());

        $this->addHeader(new Header('HOB-Client', $infoHeader->build()));
    }

    /**
     * @param Header $header
     */
    public function addHeader(Header $header)
    {
        $this->headers[] = $header;
    }

    /**
     * @param $name
     * @return bool
     */
    protected function hasHeader($name)
    {
        foreach($this->headers as $header) {
            if($header->getHeader() == $name) {
                return true;
            }
        }

        return false;
    }

    /**
     * @return array
     */
    protected function getRequestHeaders()
    {
        $headers = [];

        foreach($this->headers as $header) {
            $headers[$header->getHeader()] = $header->getValue();
        }

        return $headers;
    }

    /**
     * @param $url
     * @param array $parameters
     * @param array $headers
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function get($url, array $parameters = [], array $headers = [])
    {
        return $this->client->get($this->formatUrl($url), $parameters, array_merge($this->getRequestHeaders(), $headers));
    }

    /**
     * @param $url
     * @return string
     */
    protected function formatUrl($url)
    {
        return $this->basepath . $url;
    }
}