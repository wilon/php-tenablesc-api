<?php

namespace SecurityCenter\HttpClient\Plugin;

use SecurityCenter\Client;
use SecurityCenter\Exception\ValidationFailedException;
use Http\Client\Common\Plugin;
use Psr\Http\Message\RequestInterface;

/**
 * Add authentication to the request.
 *
 * @author Weilong Wang <github.com/wilon>
 */
class Authentication implements Plugin
{

    private $token;
    private $sid;

    public function __construct($token = '', $sid = '')
    {
        if (!$token) {
            throw new ValidationFailedException("TOKEN is necessary!");
        }
        if (!$token) {
            throw new ValidationFailedException("TNS_SESSIONID is necessary!");
        }
        $this->token = $token;
        $this->sid = $sid;
    }

    /**
     * {@inheritdoc}
     */
    public function handleRequest(RequestInterface $request, callable $next, callable $first)
    {
        $request = $request->withHeader(
            'Cookie', 'TNS_SESSIONID=' . $this->sid
        );

        $request = $request->withHeader(
            'X-SecurityCenter', $this->token
        );

        return $next($request);
    }
}
