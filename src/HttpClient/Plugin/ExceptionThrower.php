<?php

namespace PlaneLogixAPI\HttpClient\Plugin;

use PlaneLogixAPI\Exception\ApiLimitExceededException;
use PlaneLogixAPI\Exception\ErrorException;
use PlaneLogixAPI\Exception\ExceptionInterface;
use PlaneLogixAPI\Exception\ResourceNotFoundException;
use PlaneLogixAPI\Exception\RuntimeException;
use PlaneLogixAPI\Exception\ValidationFailedException;
use PlaneLogixAPI\HttpClient\Message\ResponseMediator;
use Http\Client\Common\Plugin;
use Http\Promise\Promise;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

final class ExceptionThrower implements Plugin
{
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
        return $next($request)->then(function (ResponseInterface $response): ResponseInterface {
            $status = $response->getStatusCode();

            if ($status >= 400 && $status < 600) {
                throw self::createException(
                    $status,
                    ResponseMediator::getErrorMessage($response) ?? $response->getReasonPhrase()
                );
            }

            return $response;
        });
    }

    /**
     * Create an exception from a status code and error message.
     *
     * @param int    $status
     * @param string $message
     *
     * @return ErrorException|RuntimeException
     */
    private static function createException(int $status, string $message): ExceptionInterface
    {
        if ($status === 400 || $status === 422) {
            return new ValidationFailedException($message, $status);
        }

        if ($status === 429) {
            return new ApiLimitExceededException($message, $status);
        }

        if ($status === 404) {
            return new ResourceNotFoundException($message, $status);
        }

        return new RuntimeException($message, $status);
    }
}
