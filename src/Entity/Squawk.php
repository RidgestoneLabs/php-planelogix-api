<?php

namespace PlaneLogixAPI\Entity;

use PlaneLogixAPI\Entity\Squawk\Document;
use PlaneLogixAPI\Entity\Squawk\Message;

final class Squawk extends AbstractEntity
{
    public int $id;

    public ?string $Description;

    public string $Title;

    public string $Status;

    public string $Priority;

    public string $SquawkDateFull;

    public string $SquawkDate;

    /**
     * @var Message[]
     */
    public array $Messages;

    /**
     * @var Document[]
     */
    public array $Documents;
}
