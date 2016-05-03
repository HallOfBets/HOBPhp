<?php
namespace HOB\SDK\Api\Header;

/**
 * Class AuthorizationBearer
 * @package HOB\SDK\Api\Header
 */
class AuthorizationBearer extends Header
{
    /**
     * AuthorizationBearer constructor.
     * @param $token
     */
    public function __construct ($token)
    {
        parent::__construct("Authorization", "Bearer $token");
    }
}
