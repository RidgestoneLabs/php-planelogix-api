<?php

namespace PlaneLogixAPI\Entity;

final class CalendarItem extends AbstractEntity
{
    public string $CalendarType;

    public string $IntervalType;

    public int $IntervalValue;

    public int $CalendarInterval;

    public int $DueCalendarInterval;

    public int $Interval;

    public string $IntervalTypeObj;

    public int $IntervalTypeID;

    public int $DueCalendarIntervalTypeID;

    public string $RecurringType;

    public int $RecurringTypeID;

    public string $RecurringTypeObj;

    public int $ExceedanceAllowance;

    public int $MediumDangerInterval;

    public int $MediumHighDangerInterval;

    public int $HighDangerInterval;

    public bool $PrimaryLogbookOverhaul;

    public bool $PrimaryLogbookHSI;

    public bool $PrimaryLogbookComponent;

    public string $installdate;

    public string $LastPerformedDate;

    public int $TotalInstances;

    public string $ExpectedDueDate;

    public int $DaysRemaining;

    public string $_rowVariant;

    public string $BenchmarkDate;
}
