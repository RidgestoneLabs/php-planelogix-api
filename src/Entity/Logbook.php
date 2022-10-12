<?php

namespace PlaneLogixAPI\Entity;

final class Logbook extends AbstractEntity
{
    public int $id;

    public string $aircraftId;

    public string $Position;

    public string $PositionAlt;

    public string $Make;

    public string $Model;

    public ?string $SerialNumber;

    public ?string $EngineType;

    public ComponentTotalTime $ComponentTotalTime;

    public string $LogbookTypeSlug;

    public string $ComponentFullDescription;

    public string $LogbookType;

    public string $FullLogbookTypeComplex;

    public array $OverhaulInformation;

    public string $created_at;

    public string $updated_at;

    public function build(array $parameters): void
    {
        foreach ($parameters as $property => $value) {
            if ($property === 'ComponentTotalTime') {
                $this->ComponentTotalTime = new ComponentTotalTime($value);

                unset($parameters[$property]);
            }
        }

        parent::build($parameters);
    }
}
