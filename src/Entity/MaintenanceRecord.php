<?php

namespace PlaneLogixAPI\Entity;

final class MaintenanceRecord extends AbstractEntity
{
    public string $id;

    public string $RecordID;

    public string $LogbookID;

    public string $Logbook;

    public string $DateOfService;

    public string $LongDate;

    public string $WorkDescription;

    public int $AircraftID;

    public string $TailNumber;

    public string $RecordTailNumber;

    public int $DateOfServiceTimeStamp;

    public string $TTAF;

    public string $Tach;

    public string $Hobbs;

    public string $updated_at;
}
