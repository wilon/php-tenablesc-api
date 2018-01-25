<?php

namespace SecurityCenter;

use SecurityCenter\Api\ApiInterface;
use SecurityCenter\Exception\InvalidArgumentException;
use SecurityCenter\Exception\BadMethodCallException;
use SecurityCenter\HttpClient\Builder;
use SecurityCenter\HttpClient\Plugin\SecurityCenterExceptionThrower;
use SecurityCenter\HttpClient\Plugin\Authentication;
use SecurityCenter\HttpClient\Plugin\History;
use SecurityCenter\HttpClient\Plugin\PathPrepend;
use Http\Client\Common\HttpMethodsClient;
use Http\Client\Common\Plugin;
use Http\Client\HttpClient;
use Http\Discovery\UriFactoryDiscovery;
use Psr\Cache\CacheItemPoolInterface;
use Http\Adapter\Guzzle6 as GuzzleHttp;
use SecurityCenter\HttpClient\Message\ResponseMediator;
use Http\Message\Cookie;
use Http\Message\CookieJar;
use GuzzleHttp\Cookie\SetCookie;

class Client
{

    /**
     * @var Builder
     */
    private $httpClientBuilder;

    /**
     * @var History
     */
    private $responseHistory;

    /**
     * @var ApiInstance
     */
    private $apiInstance;


    /**
     * Instantiate a new SecurityCenter client.
     *
     * @param HttpClient $httpClient
     */
    public function __construct(HttpClient $httpClient)
    {
        $this->responseHistory = new History();
        $builder = $this->httpClientBuilder ?: new Builder($httpClient);
        $this->httpClientBuilder = $builder;
        $this->securityCenterUri = $securityCenterUri;

        $builder->addPlugin(new SecurityCenterExceptionThrower());
        $builder->addPlugin(new Plugin\HistoryPlugin($this->responseHistory));
        $builder->addPlugin(new Plugin\RedirectPlugin());
        $repoUrl = 'https://github.com/wilon/php-tenablesc-api';
        $builder->addPlugin(new Plugin\HeaderDefaultsPlugin(array(
            'Content-Type' => 'application/json',
            'User-Agent' => "php-tenablesc-api ($repoUrl)",
        )));
        $builder->addHeaderValue('Accept', 'application/json');
    }

    /**
     * @param string $name
     *
     * @throws InvalidArgumentException
     *
     * @return ApiInterface
     */
    public function api($name)
    {
        $className = "\SecurityCenter\Api\\" . ucfirst($name);

        if (! class_exists($className)) {
            throw new InvalidArgumentException(
                sprintf('Undefined api instance called: "%s"', $name)
            );
        }

        if (array_key_exists($className, $this->apiInstance)) {
            return $this->apiInstance[$className];
        }

        return new $className($this);
    }

    /**
     * Authenticate a user for all next requests.
     *
     * @param  string  $username
     * @param  string  $password
     * @param  boolean $releaseSession
     */
    public function authenticate($username = '', $password = '', $releaseSession = false)
    {
        if (!$username || !$password) {
            throw new InvalidArgumentException('You need to authentication param!');
        }

        $client = $this->getHttpClient();
        $builder = $this->getHttpClientBuilder();

        // Get token
        $response = $client->post('rest/token', [], json_encode([
            'username' => $username,
            'password' => $password,
        ]));
        $body = ResponseMediator::getContent($response);
        $token = $body['response']['token'];

        // Get sid
        $sid = '';
        $cookieData = $response->getHeaders()['Set-Cookie'];    // two TNS_SESSIONID
        foreach ($cookieData as $cookieStr) {
            $cookieArr = SetCookie::fromString($cookieStr)->toArray();
            if ($cookieArr['Name'] == 'TNS_SESSIONID') {
                $sid = $cookieArr["Value"];
            }
        }

        // Authentication
        $builder->removePlugin(Authentication::class);
        $builder->addPlugin(new Authentication($token, $sid));
    }

    /**
     * Create a Github\Client using a HttpClient.
     *
     * @param HttpClient $httpClient
     *
     * @return Client
     */
    public static function createWithHttpClient(HttpClient $httpClient)
    {
        $builder = new Builder($httpClient);
        return new self($builder);
    }

    /**
     * Add a cache plugin to cache responses locally.
     *
     * @param CacheItemPoolInterface $cache
     * @param array                  $config
     */
    public function addCache(CacheItemPoolInterface $cachePool, array $config = [])
    {
        $this->getHttpClientBuilder()->addCache($cachePool, $config);
    }

    /**
     * Remove the cache plugin.
     */
    public function removeCache()
    {
        $this->getHttpClientBuilder()->removeCache();
    }

    /**
     * @param string $name
     *
     * @throws BadMethodCallException
     *
     * @return ApiInterface
     */
    public function __call($name, $args)
    {
        try {
            return $this->api($name);
        } catch (InvalidArgumentException $e) {
            throw new BadMethodCallException(
                sprintf('Undefined method called: "%s"', $name)
            );
        }
    }

    /**
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function getLastResponse()
    {
        return $this->responseHistory->getLastResponse();
    }

    /**
     * @return HttpMethodsClient
     */
    public function getHttpClient()
    {
        return $this->getHttpClientBuilder()->getHttpClient();
    }

    /**
     * @return Builder
     */
    protected function getHttpClientBuilder()
    {
        return $this->httpClientBuilder;
    }
}
