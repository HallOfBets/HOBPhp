<?php
namespace HOB\SDK\Api\Helper;

/**
 * Class InfoHeaders
 * @package HOB\SDK\Api\Helper
 */
class InfoHeaders
{
    /**
     * @var array
     */
    protected $package;

    /**
     * @var array
     */
    protected $environment;

    /**
     * @var array
     */
    protected $dependencies;


    /**
     * Headers constructor.
     */
    public function __construct()
    {
        $this->package      = [];
        $this->environment  = [];
        $this->dependencies = [];
    }

    /**
     * @param $name
     * @param $version
     */
    public function setPackage($name, $version)
    {
        $this->package[] = [
            'name'      => $name,
            'version'   => $version,
        ];
    }

    /**
     * @param $name
     * @param $version
     */
    public function setEnvironment($name, $version)
    {
        $this->environment[] = [
            'name'      => $name,
            'version'   => $version,
        ];
    }

    /**
     * @param $name
     * @param $version
     */
    public function setDependencies($name, $version)
    {
        $this->dependencies[] = [
            'name'      => $name,
            'version'   => $version,
        ];
    }

    /**
     * @return array
     */
    public function get()
    {
        return [
            'package'       => $this->package,
            'environment'   => $this->environment,
            'dependencies'  => $this->dependencies,
        ];
    }

    /**
     * @return string
     */
    public function build()
    {
        return base64_encode(json_encode($this->get()));
    }
}
