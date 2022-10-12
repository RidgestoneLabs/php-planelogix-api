<?php

namespace PlaneLogixAPI\Api;

use Http\Client\Exception;
use PlaneLogixAPI\Client;
use PlaneLogixAPI\Exception\ExceptionInterface;
use PlaneLogixAPI\HttpClient\Message\ResponseMediator;
use PlaneLogixAPI\HttpClient\Util\QueryStringBuilder;
use stdClass;

abstract class AbstractApi
{
    private const URI_PREFIX = '/api';

    private Client $client;

    /**
     * Create a new API instance.
     *
     * @param Client $client
     *
     * @return void
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    protected function getClient(): Client
    {
        return $this->client;
    }

    /**
     * Send a GET request with query params.
     *
     * @param string               $uri
     * @param array                $params
     * @param array<string,string> $headers
     *
     * @return stdClass|stdClass[]
     * @throws ExceptionInterface|Exception
     */
    protected function get(string $uri, array $params = [], array $headers = [])
    {
        $response = $this->client->getHttpClient()->get(self::buildUri($uri, $params), $headers);

        return ResponseMediator::getContent($response);
    }

    /**
     * Send a POST request with JSON-encoded params.
     *
     * @param string               $uri
     * @param array                $params
     * @param array<string,string> $headers
     *
     * @return stdClass|stdClass[]
     * @throws ExceptionInterface
     * @throws Exception
     */
    protected function post(string $uri, array $params = [], array $headers = [])
    {
        $body = self::prepareBody($params);

        $response = $this->client->getHttpClient()->post(self::buildUri($uri), $headers, $body ?? '');

        return ResponseMediator::getContent($response);
    }

    /**
     * Send a DELETE request with JSON-encoded params.
     *
     * @param string               $uri
     * @param array                $params
     * @param array<string,string> $headers
     * @param array<string,string> $queryParams
     *
     * @return void
     * @throws Exception
     */
    protected function delete(string $uri, array $params = [], array $headers = [], array $queryParams = []): void
    {
        $body = $this->prepareBody($params);

        $uri = self::buildUri($uri, $queryParams);
        $this->client->getHttpClient()->delete($uri, $headers, $body);
    }

    /**
     * Build request URI
     *
     * @param string $uri
     * @param array  $query
     *
     * @return string
     */
    private static function buildUri(string $uri, array $query = []): string
    {
        return sprintf('%s%s%s', self::URI_PREFIX, $uri, QueryStringBuilder::build($query));
    }

    /**
     * Prepare form data body for request
     *
     * @param array $params
     *
     * @return string|null
     */
    private function prepareBody(array $params): ?array
    {
        if (count($params) === 0) {
            return null;
        }

        $multipartData = [];
        $isMultipart = false;

        foreach ($params as $key => $value) {
            $contents = $value;

            if (is_resource($value)) {
                $isMultipart = true;
                $contents = $this->client->getStreamFactory()->createStreamFromResource($value);
            }

            $multipartData[] = [
                'name' => $key,
                'contents' => $contents,
            ];
        }

        if ($isMultipart) {
            return ['multipart' => $multipartData];
        }

        return ['form_params' => $params];
    }
}
