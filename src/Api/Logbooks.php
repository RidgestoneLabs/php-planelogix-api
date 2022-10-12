<?php

namespace PlaneLogixAPI\Api;

use Http\Client\Exception;
use PlaneLogixAPI\Entity\Logbook as LogbookResponseEntity;
use PlaneLogixAPI\Entity\Request\Logbook;
use PlaneLogixAPI\Exception\ExceptionInterface;

final class Logbooks extends AbstractApi
{
    /**
     * @param int $aircraftId
     *
     * @return LogbookResponseEntity[]
     * @throws Exception
     * @throws ExceptionInterface
     */
    public function getByAircraftId(int $aircraftId): array
    {
        $logbooks = $this->get("/v2/logbooks/{$aircraftId}");

        return array_map(fn($logbook) => new LogbookResponseEntity($logbook), (array) $logbooks);
    }

    /**
     * @param int     $aircraftId
     * @param Logbook $logbookRequest
     *
     * @return LogbookResponseEntity
     * @throws Exception
     * @throws ExceptionInterface
     */
    public function create(int $aircraftId, Logbook $logbookRequest): LogbookResponseEntity
    {
        $logbook = $this->post("/v2/logbooks/{$aircraftId}", $logbookRequest->getRequestData());

        return new LogbookResponseEntity($logbook);
    }

    /**
     * @param int $logbookId
     *
     * @throws Exception
     * @throws ExceptionInterface
     */
    public function remove(int $logbookId): void
    {
        $this->delete("/v2/logbooks/{$logbookId}");
    }

    /**
     * @param int     $logbookId
     * @param Logbook $logbookRequest
     *
     * @throws Exception
     * @throws ExceptionInterface
     */
    public function update(int $logbookId, Logbook $logbookRequest): void
    {
        $this->post("/v2/logbooks/{$logbookId}", $logbookRequest->getRequestData());
    }
}
