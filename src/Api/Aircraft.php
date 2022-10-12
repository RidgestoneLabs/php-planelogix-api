<?php

namespace PlaneLogixAPI\Api;

use Http\Client\Exception;
use PlaneLogixAPI\Entity\Aircraft as AircraftEntity;
use PlaneLogixAPI\Entity\AircraftBackup as AircraftBackupEntity;
use PlaneLogixAPI\Entity\AircraftCycleType as CycleTypeEntity;
use PlaneLogixAPI\Entity\AircraftStatus as AircraftStatusEntity;
use PlaneLogixAPI\Entity\AircraftUpdateTimes as AircraftUpdateTimesEntity;
use PlaneLogixAPI\Entity\NextDueItems;
use PlaneLogixAPI\Entity\Request\AircraftUpdateTimes as AircraftUpdateTimesRequest;
use PlaneLogixAPI\Exception\ExceptionInterface;

final class Aircraft extends AbstractApi
{
    /**
     * @return AircraftEntity[]
     * @throws Exception
     * @throws ExceptionInterface
     */
    public function listAircraft(): array
    {
        $aircraftListings = $this->get('/v2/aircraft/list');

        return array_map(fn($aircraft) => new AircraftEntity($aircraft), (array) $aircraftListings);
    }

    /**
     * @param string $aircraftId
     * @param bool   $airworthinessOnly
     *
     * @return NextDueItems
     * @throws Exception
     * @throws ExceptionInterface
     */
    public function nextDueItems(string $aircraftId, bool $airworthinessOnly = false): NextDueItems
    {
        $nextDueItems = $this->get(sprintf('/v2/aircraft/next-due/%s/%s', (int) $airworthinessOnly, $aircraftId));

        return new NextDueItems($nextDueItems);
    }

    /**
     * @return CycleTypeEntity[]
     * @throws Exception
     * @throws ExceptionInterface
     */
    public function cycleTypes(): array
    {
        $cycleTypes = $this->get('/v2/aircraft/cycle-types');

        return array_map(fn($cycleType) => new CycleTypeEntity($cycleType), $cycleTypes->cycleTypes);
    }

    /**
     * Returns the current status of your aircraft. This is based on a count of your tracking items and their statuses.
     *
     * @param string $aircraftId
     *
     * @return AircraftStatusEntity
     * @throws Exception
     * @throws ExceptionInterface
     */
    public function status(string $aircraftId): AircraftStatusEntity
    {
        $status = $this->get(sprintf('/v2/aircraft/status/%s', $aircraftId));

        return new AircraftStatusEntity($status);
    }

    /**
     * Creates a job which will back up all of your maintenance records.
     * You will receive an email when the job has completed.
     *
     * @param string $aircraftId
     *
     * @return AircraftBackupEntity
     * @throws Exception
     * @throws ExceptionInterface
     */
    public function backup(string $aircraftId): AircraftBackupEntity
    {
        $status = $this->get(sprintf('/v2/aircraft-backup/%s', $aircraftId));

        return new AircraftBackupEntity($status);
    }

    /**
     * Update your aircraft's current time(s) and cycles.
     *
     * @param string                     $aircraftId
     * @param AircraftUpdateTimesRequest $request
     *
     * @return AircraftUpdateTimesEntity
     * @throws Exception
     * @throws ExceptionInterface
     */
    public function updateAircraftTimes(
        string $aircraftId,
        AircraftUpdateTimesRequest $request
    ): AircraftUpdateTimesEntity {
        $updateTimes = $this->post("/v2/aircraft/update-times/{$aircraftId}", $request->getRequestData());

        return new AircraftUpdateTimesEntity($updateTimes);
    }
}
