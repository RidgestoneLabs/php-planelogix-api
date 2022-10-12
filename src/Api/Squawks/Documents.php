<?php

namespace PlaneLogixAPI\Api\Squawks;

use Http\Client\Exception;
use PlaneLogixAPI\Api\AbstractApi;
use PlaneLogixAPI\Entity\Request\Squawk\Document as DocumentRequest;
use PlaneLogixAPI\Entity\Squawk\Document;
use PlaneLogixAPI\Exception\ExceptionInterface;

final class Documents extends AbstractApi
{
    /**
     * Adds a document to the squawk. Note that you will need the UUID of your aircraft here.
     * Also, important to note is the use of "aircraft-squawk-image" or "aircraft-squawk-video" for the DocType.
     * Doing this will assign the document to the squawk.
     *
     * @throws Exception
     * @throws ExceptionInterface
     */
    public function create(DocumentRequest $request): Document
    {
        $message = $this->post('/v2/upload', $request->getRequestData());

        return new Document($message);
    }

    /**
     * @throws Exception
     */
    public function remove(string $aircraftSquawkId, string $squawkDocumentId): void
    {
        $this->delete("/v2/aircraft-squawk/{$aircraftSquawkId}/documents/{$squawkDocumentId}");
    }
}
