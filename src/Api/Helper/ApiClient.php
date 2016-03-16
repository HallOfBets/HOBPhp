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

        $this->endpoint = $config['endpoint'];

        // Handle headers
        $this->processHeaders(isset($config['headers']) ? $config['headers'] : []);

        // Guzzle options
        $this->guzzleOptions = isset($config['guzzleOptions']) ? $config['guzzleOptions'] : [];

        // Set client
        $this->client = new GuzzleClient($this->guzzleOptions);
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

            $this->headers[] = $header;
        }

        $this->addClientInfoHeaders();
    }


    /**
     *
     */
    private function addClientInfoHeaders()
    {
        $infoHeader = new InfoHeaders();
        $infoHeader->setPackage('hob-api-php', self::API_VERSION);
        $infoHeader->setEnvironment('php', phpversion());

        $this->headers[] = new Header('HOB-Client', $infoHeader->build());
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
     * @param $url
     * @param array $parameters
     * @param array $headers
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function get($url, array $parameters = [], array $headers = [])
    {
        return $this->client->get($url, $parameters, $headers);
    }
}