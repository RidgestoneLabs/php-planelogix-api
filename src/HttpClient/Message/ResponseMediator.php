<?php

namespace PlaneLogixAPI\HttpClient\Message;

use PlaneLogixAPI\Exception\RuntimeException;
use PlaneLogixAPI\HttpClient\Util\JsonObject;
use Psr\Http\Message\ResponseInterface;
use stdClass;

final class ResponseMediator
{
    public const HEADER_NAME_CONTENT_TYPE = 'Content-Type';
    public const CONTENT_TYPE_FORM_DATA = 'application/x-www-form-urlencoded';
    public const CONTENT_TYPE_JSON = 'application/json';

    /**
     * @param ResponseInterface $response
     *
     * @return stdClass|stdClass[]
     * @throws RuntimeException
     */
    public static function getContent(ResponseInterface $response)
    {
        if ($response->getStatusCode() === 204) {
            return JsonObject::empty();
        }

        $body = (string) $response->getBody();

        if ($body === '') {
            return JsonObject::empty();
        }

        if (strpos(self::getHeader($response, self::HEADER_NAME_CONTENT_TYPE) ?? '', self::CONTENT_TYPE_JSON) !== 0) {
            throw new RuntimeException(sprintf('The content type was not %s.', self::CONTENT_TYPE_JSON));
        }

        return JsonObject::decode($body);
    }

    /**
     * Get the error message from the response if present.
     *
     * @param ResponseInterface $response
     *
     * @return string|null
     */
    public static function getErrorMessage(ResponseInterface $response): ?string
    {
        try {
            $content = self::getContent($response);
        } catch (RuntimeException $e) {
            return null;
        }

        return isset($content->message) && is_string($content->message) ? $content->message : null;
    }

    /**
     * Get the pagination data from the response.
     *
     * @param ResponseInterface $response
     *
     * @return array<string,string>
     */
    public static function getPagination(ResponseInterface $response): array
    {
        try {
            $content = self::getContent($response);
        } catch (RuntimeException $e) {
            return [];
        }

        if (!isset($content->links->pages) || !is_object($content->links->pages)) {
            return [];
        }

        return array_filter(get_object_vars($content->links->pages));
    }

    /**
     * Get the rate limit data from the response.
     *
     * @param ResponseInterface $response
     *
     * @return array<string,int>
     */
    public static function getRateLimit(ResponseInterface $response): array
    {
        $reset = self::getHeader($response, 'RateLimit-Reset');
        $remaining = self::getHeader($response, 'RateLimit-Remaining');
        $limit = self::getHeader($response, 'RateLimit-Limit');

        if (null === $reset || null === $remaining || null === $limit) {
            return [];
        }

        return [
            'reset' => (int) $reset,
            'remaining' => (int) $remaining,
            'limit' => (int) $limit,
        ];
    }

    /**
     * @param ResponseInterface $response
     * @param string            $name
     *
     * @return string|null
     */
    private static function getHeader(ResponseInterface $response, string $name): ?string
    {
        $headers = $response->getHeader($name);

        return array_shift($headers);
    }
}
