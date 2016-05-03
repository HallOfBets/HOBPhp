<?php
namespace HOB\SDK\Api\Header\Authorization;

use HOB\SDK\Api\Header\Header;

/**
 * Class AuthorizationBearer
 * @package HOB\SDK\Api\Header\Authorization
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
