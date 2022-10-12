<?php

namespace PlaneLogixAPI\Entity\Document;

use PlaneLogixAPI\Entity\AbstractEntity;

final class Upload extends AbstractEntity
{
    public int $id;

    public string $DocUUID;

    public string $FinalFileName;

    public string $DocumentTypeID;

    public string $BucketLink;

    public string $LiveLink;

    public ?string $ShortHandText;
}
