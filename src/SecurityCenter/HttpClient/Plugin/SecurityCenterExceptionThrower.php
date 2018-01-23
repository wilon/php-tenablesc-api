<?php

namespace SecurityCenter\HttpClient\Plugin;

use Http\Client\Common\Plugin;
use Psr\Http\Message\RequestInterface;
use SecurityCenter\HttpClient\Message\ResponseMediator;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Exception\RequestException;

/**
 * @author Weilong Wang <github.com/wilon>
 */
class SecurityCenterExceptionThrower implements Plugin
{
    /**
     * {@inheritdoc}
     */
    public function handleRequest(RequestInterface $request, callable $next, callable $first)
    {
        return $next($request)->then(function (ResponseInterface $response) use ($request) {

            if ($response->getStatusCode() < 400 || $response->getStatusCode() > 600) {
                return $response;
            }

            $content = ResponseMediator::getContent($response);

            if (is_array($content) && isset($content['error_msg'])) {
                try {
                    throw RequestException::create($request, $response);
                } catch (RequestException $e) {
                    $msg = str_replace(
                        '(truncated...)',
                        json_encode($content),
                        $e->getMessage()
                    );
                    throw new RequestException($msg, $request, $response);
                }
            } else {
                throw RequestException::create($request, $response);
            }
        });
    }
}
