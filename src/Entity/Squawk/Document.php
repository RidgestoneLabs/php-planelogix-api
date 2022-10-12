<?php

namespace PlaneLogixAPI\Entity\Squawk;

use PlaneLogixAPI\Entity\AbstractEntity;
use PlaneLogixAPI\Entity\Document\Upload;

final class Document extends AbstractEntity
{
    public string $status;

    public string $msg;

    public string $title;

    public string $type;

    public string $error;

    public string $mxrecid;

    public string $fieldErrors;

    public string $url;

    public string $LiveLink;

    public array $data;

    public Upload $upload;

    public int $DocumentAircraftSquawkID;

    public array $DocumentUpload;
}
