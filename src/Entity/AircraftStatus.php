<?php

namespace PlaneLogixAPI\Entity;

final class AircraftStatus extends AbstractEntity
{
    public int $gray;

    public int $danger;

    public int $warning;

    public int $primary;

    public int $success;

    public int $nottracked;

    public string $overallstatus;
}
