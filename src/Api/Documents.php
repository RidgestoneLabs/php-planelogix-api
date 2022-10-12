<?php

namespace PlaneLogixAPI\Api;

use Http\Client\Exception;
use PlaneLogixAPI\Entity\DocumentType as DocumentTypeEntity;
use PlaneLogixAPI\Entity\Document as DocumentEntity;
use PlaneLogixAPI\Exception\ExceptionInterface;

final class Documents extends AbstractApi
{
    /**
     * Returns a list of all the documents uploaded for your aircraft.
     *
     * @param string $aircraftId
     *
     * @return DocumentEntity[]
     * @throws Exception
     * @throws ExceptionInterface
     */
    public function documents(string $aircraftId): array
    {
        $documents = $this->get("/v2/documents/{$aircraftId}");

        return array_map(fn($document) => new DocumentEntity($document), (array) $documents);
    }

    /**
     * Returns a list of different document types used on the platform.
     *
     * @return DocumentTypeEntity[]
     * @throws Exception
     * @throws ExceptionInterface
     */
    public function documentTypes(): array
    {
        $documentTypes = $this->get('/v2/document-types');

        return array_map(fn($documentType) => new DocumentTypeEntity($documentType), (array) $documentTypes);
    }

    /**
     * Downloads an individual document by an ID.
     *
     * @throws Exception
     */
    public function download(string $documentId): string
    {
        $response = $this->getClient()->getHttpClient()->get("/v2/download/doc/{$documentId}");

        return (string) $response->getBody();
    }
}
