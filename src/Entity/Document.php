<?php

namespace PlaneLogixAPI\Entity;

final class Document extends AbstractEntity
{
    public int $id;

    public string $aircraftId;

    public ?string $maintenanceRecordId;

    public ?string $trackingItemId;

    public string $documentMetaAdj;

    public string $shortHandText;

    public string $fileName;

    public string $imageType;

    public string $bucketLink;
}
