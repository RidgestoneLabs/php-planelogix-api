<?php

namespace PlaneLogixAPI\Entity;

final class TrackingItem extends AbstractEntity
{
    public int $id;

    public int $LogixTrackingItemId;

    public string $EventTitle;

    public string $EventType;

    public ?string $EventNumber;

    public string $Logbook;

    public array $MeterItems;

    public array $CalendarItems;

    public array $CycleItems;

    public array $Documents;

    public string $RowVariant;

    public ?array $MXRecordImages;

    public string $TrackingItemUUID;

    public bool $IsPrimaryLogbookComponent;

    public bool $IsPrimaryLogbookHsi;

    public bool $IsPrimaryLogbookOverhaul;

    public bool $IsPrimaryTrackingItem;

    public ?string $DateOfService;

    public ?string $WorkDescription;

    public ?string $ttafOut;

    public ?string $tachOut;

    public ?string $hobbsOut;

    public ?string $heaterHobbsOut;
}
