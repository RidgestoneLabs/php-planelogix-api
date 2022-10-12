<?php

namespace PlaneLogixAPI\HttpClient\Plugin;

use Http\Client\Common\Plugin\Journal;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

final class History implements Journal
{
    /**
     * The last response.
     *
     * @var ResponseInterface|null
     */
    private ?ResponseInterface $lastResponse;

    /**
     * Get the last response.
     *
     * @return ResponseInterface|null
     */
    public function getLastResponse(): ?ResponseInterface
    {
        return $this->lastResponse;
    }

    /**
     * Record a successful call.
     *
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     *
     * @return void
     */
    public function addSuccess(RequestInterface $request, ResponseInterface $response): void
    {
        $this->lastResponse = $response;
    }

    /**
     * Record a failed call.
     *
     * @param RequestInterface         $request
     * @param ClientExceptionInterface $exception
     *
     * @return void
     */
    public function addFailure(RequestInterface $request, ClientExceptionInterface $exception): void
    {
    }
}
