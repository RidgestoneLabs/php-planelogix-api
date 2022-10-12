<?php

namespace PlaneLogixAPI;

use Http\Client\Common\HttpMethodsClientInterface;
use Http\Client\Common\Plugin\AddHostPlugin;
use Http\Client\Common\Plugin\HeaderDefaultsPlugin;
use Http\Client\Common\Plugin\HistoryPlugin;
use Http\Client\Common\Plugin\RedirectPlugin;
use Http\Client\Exception;
use Http\Discovery\Psr17FactoryDiscovery;
use PlaneLogixAPI\Api\Aircraft;
use PlaneLogixAPI\Api\Documents;
use PlaneLogixAPI\Api\Logbooks;
use PlaneLogixAPI\Api\MaintenanceRecords;
use PlaneLogixAPI\Api\Squawks;
use PlaneLogixAPI\Api\TrackingItems;
use PlaneLogixAPI\HttpClient\Builder;
use PlaneLogixAPI\HttpClient\Message\ResponseMediator;
use PlaneLogixAPI\HttpClient\Plugin\Authentication;
use PlaneLogixAPI\HttpClient\Plugin\ExceptionThrower;
use PlaneLogixAPI\HttpClient\Plugin\History;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamFactoryInterface;

class Client
{
    /**
     * The default base URL
     *
     * @var string
     */
    private const BASE_URL = 'https://dev.planelogix.com/';
    /**
     * The default user agent header
     *
     * @var string
     */
    private const USER_AGENT = 'planelogix-api-php-client/1.0';

    private Builder $httpClientBuilder;

    private History $responseHistory;

    private bool $isAuthenticated = false;

    /**
     * @param Builder|null $httpClientBuilder
     *
     * @return void
     */
    public function __construct(Builder $httpClientBuilder = null)
    {
        $this->httpClientBuilder = $builder = $httpClientBuilder ?? new Builder();
        $this->responseHistory = new History();

        $builder->addPlugin(new ExceptionThrower());
        $builder->addPlugin(new HistoryPlugin($this->responseHistory));
        $builder->addPlugin(new RedirectPlugin());

        $builder->addPlugin(
            new HeaderDefaultsPlugin([
                'Accept' => ResponseMediator::CONTENT_TYPE_JSON,
                'User-Agent' => self::USER_AGENT,
            ])
        );

        $this->setUrl(self::BASE_URL);
    }

    /**
     * @param ClientInterface $httpClient
     *
     * @return Client
     */
    public static function createWithHttpClient(ClientInterface $httpClient): self
    {
        $builder = new Builder($httpClient);

        return new self($builder);
    }

    public function aircraft(): Aircraft
    {
        return new Aircraft($this);
    }

    public function documents(): Documents
    {
        return new Documents($this);
    }

    public function logbooks(): LogBooks
    {
        return new LogBooks($this);
    }

    public function maintenanceRecords(): MaintenanceRecords
    {
        return new MaintenanceRecords($this);
    }

    public function squawks(): Squawks
    {
        return new Squawks($this);
    }

    public function trackingItems(): TrackingItems
    {
        return new TrackingItems($this);
    }

    /**
     * @param string $email
     * @param string $password
     *
     * @return void
     * @throws Exception
     */
    public function authenticate(string $email, string $password): void
    {
        if ($this->isAuthenticated) {
            return;
        }

        $builder = $this->getHttpClientBuilder();

        $response = $builder->getHttpClient()->post(
            'api/v2/login',
            [
                'Content-Type' => 'application/x-www-form-urlencoded',
                'X-Requested-With' => 'XMLHttpRequest',
            ],
            http_build_query(['email' => $email, 'password' => $password])
        );

        $data = ResponseMediator::getContent($response);
        $token = $data->access_token ?? '';

        $builder->addPlugin(new Authentication($token));

        $this->isAuthenticated = true;
    }

    /**
     * Set the base URL.
     *
     * @param string $url
     *
     * @return void
     */
    public function setUrl(string $url): void
    {
        $this->httpClientBuilder->removePlugin(AddHostPlugin::class);
        $this->httpClientBuilder->addPlugin(
            new AddHostPlugin(Psr17FactoryDiscovery::findUriFactory()->createUri($url))
        );
    }

    /**
     * Get the last response.
     *
     * @return ResponseInterface|null
     */
    public function getLastResponse(): ?ResponseInterface
    {
        return $this->responseHistory->getLastResponse();
    }

    /**
     * Get the HTTP client.
     *
     * @return HttpMethodsClientInterface
     */
    public function getHttpClient(): HttpMethodsClientInterface
    {
        return $this->getHttpClientBuilder()->getHttpClient();
    }

    /**
     * Get the stream factory.
     *
     * @return StreamFactoryInterface
     */
    public function getStreamFactory(): StreamFactoryInterface
    {
        return $this->getHttpClientBuilder()->getStreamFactory();
    }

    /**
     * Get the HTTP client builder.
     *
     * @return Builder
     */
    protected function getHttpClientBuilder(): Builder
    {
        return $this->httpClientBuilder;
    }
}
