<?php

namespace PlaneLogixAPI\Entity\Squawk;

use PlaneLogixAPI\Entity\AbstractEntity;

final class Invite extends AbstractEntity
{
    public int $id;

    public string $AircraftSquawkID;

    public string $InviteString;

    public string $Email;

    public string $created_at;

    public string $updated_at;

    public ?string $deleted_at;

    public string $CreatedByUserID;

    public ?string $DeletedByUserID;

    public string $CreatedBy;
}
