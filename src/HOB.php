<?php
namespace HOB\SDK;


use HOB\SDK\Exception\CoreException;

/**
 * Class HOB
 * @package HOB\SDK
 */
class HOB
{
    /**
     * @var string
     */
    private $domain;

    /**
     * @var string
     */
    private $apiKey;

    /**
     * @var boolean
     */
    private $debugMode;


    /**
     * HOB constructor.
     * @param array $config
     */
    public function __construct(array $config)
    {
        // Check system requirements for SDK
        $this->checkRequirements();

        // Check domain
        if(!isset($config['domain'])) {
            throw new CoreException("Missing 'domain' argument");
        }

        $this->domain = $config['domain'];

        // Check api key
        if(!isset($config['apikey'])) {
            throw new CoreException("Missing 'apikey' argument");
        }

        $this->apiKey = $config['apikey'];

        // Handle debug mode
        $this->debugMode = isset($config['debug']) ? (boolean) $config['debug'] : false;



    }

    /**
     * Checks for all dependencies of SDK or API.
     *
     * @throws CoreException If CURL extension is not found.
     * @throws CoreException If JSON extension is not found.
     */
    final public function checkRequirements()
    {
        if (!function_exists('curl_version')) {
            throw new CoreException('CURL extension is needed to use HOB SDK. Not found.');
        }

        if (!function_exists('json_decode')) {
            throw new CoreException('JSON extension is needed to use HOB SDK. Not found.');
        }
    }
}
