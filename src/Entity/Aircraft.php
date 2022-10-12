<?php

namespace PlaneLogixAPI\Entity;

final class Aircraft extends AbstractEntity
{
    public int $id;

    public string $updated_at;

    public string $tailNumber;

    public string $info;

    /**
     * @var AircraftLogbook[]
     */
    public array $logbooks;

    public string $uuid;

    public string $make;

    public string $model;

    public string $serialNumber;

    public int $userId;

    public float $transcriptionPercComplete;

    public int $transcriptionPercCompleteWhole;

    public int $availableRecords;

    public int $potentialRecords;

    public int $dangerTrackingItems;

    public int $warningTrackingItems;

    public int $primaryTrackingItems;

    public int $successTrackingItems;

    public int $notTrackedTrackingItems;

    public float $currentttaf;

    public float $currenttach;

    public float $currenthobbs;

    public string $timeservicedate;

    public function build(array $parameters): void
    {
        foreach ($parameters as $property => $value) {
            if ($property === 'logbooks') {
                if (\is_array($value)) {
                    $this->logbooks = [];

                    foreach ($value as $key => $logbook) {
                        if (\is_object($logbook)) {
                            $this->logbooks[$key] = new Logbook($logbook);
                        }
                    }
                }

                unset($parameters[$property]);
            }
        }

        parent::build($parameters);
    }
}
