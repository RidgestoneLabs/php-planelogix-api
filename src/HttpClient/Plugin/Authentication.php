<?php

namespace PlaneLogixAPI\HttpClient\Plugin;

use Http\Client\Common\Plugin;
use Http\Promise\Promise;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

final class Authentication implements Plugin
{
    /**
     * The authorization header.
     *
     * @var string
     */
    private string $header;

    /**
     * Create a new authentication plugin instance.
     *
     * @param string $token
     *
     * @return void
     */
    public function __construct(string $token)
    {
        $this->header = sprintf('Bearer %s', $token);
    }

    /**
     * Handle the request and return the response coming from the next callable.
     *
     * @param RequestInterface                                       $request
     * @param callable(RequestInterface): Promise<ResponseInterface> $next
     * @param callable(RequestInterface): Promise<ResponseInterface> $first
     *
     * @return Promise<ResponseInterface>
     */
    public function handleRequest(RequestInterface $request, callable $next, callable $first): Promise
    {
        $request = $request->withHeader('Authorization', $this->header);

        return $next($request);
    }
}
