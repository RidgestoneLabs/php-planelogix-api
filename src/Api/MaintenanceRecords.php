<?php

namespace PlaneLogixAPI\Api;

use Http\Client\Exception;
use PlaneLogixAPI\Entity\Logbook as LogbookResponseEntity;
use PlaneLogixAPI\Entity\Request\Logbook;
use PlaneLogixAPI\Exception\ExceptionInterface;

final class MaintenanceRecords extends AbstractApi
{
    /**
     * Returns a list of all maintenance records sorted in ascending order by date.
     * You can filter records by date and logbook type.
     * If the date is not formatted like yyyy-mm-dd it will be totally ignored.
     *
     * Optional Query Parameters
     *
     * [start_date] the earliest record you want to see (formatted like yyyy-mm-dd)
     * [end_date] the latest record your want to see (formatted like yyyy-mm-dd)
     * [logbook_type] the full name of the logbook you want to see (must be properly escaped, like Left%20Engine).
     *  Examples include:
     *      Airframe,
     *      Engine,
     *      Propeller,
     *      Left%20Engine,
     *      Right%20Engine,
     *      Left%20Propeller,
     *      Right%20Propeller
     *
     * @param int         $aircraftId
     * @param string|null $startDate
     * @param string|null $endDate
     * @param string|null $logbookType
     *
     * @return array
     * @throws Exception
     * @throws ExceptionInterface
     */
    public function getByAircraftId(
        int $aircraftId,
        string $startDate = null,
        string $endDate = null,
        string $logbookType = null
    ): array {
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
