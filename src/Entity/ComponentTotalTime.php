<?php

namespace PlaneLogixAPI\Entity;

final class ComponentTotalTime extends AbstractEntity
{
    public int $TTAFAtInstall;

    public int $HobbsAtInstall;

    public int $TachAtInstall;

    public string $InstallDate;

    public int $PreviousCyclesAtInstall;

    public float $PreviousHoursAtInstall;

    public float $Current_TotalTTAF_Hours;

    public float $Current_TotalHobbs_Hours;

    public float $Current_TotalTach_Hours;

    public float $Current_ComponentTotalTimeHours;

    public float $Current_ComponentTimeSinceLastOverhaul;

    public float $Current_ComponentTimeSinceLastHotSection;

    public string $Current_ComponentTotalTimeDays;

    public string $EntryDate;

    public string $CurrentAircraftTTAF;

    public string $ResourceType;

    public string $Notes;
}
