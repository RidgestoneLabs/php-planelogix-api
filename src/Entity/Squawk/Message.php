<?php

namespace PlaneLogixAPI\Entity\Squawk;

use PlaneLogixAPI\Entity\AbstractEntity;

final class Message extends AbstractEntity
{
    public int $id;

    public string $Message;

    public string $CreatedBy;
}
