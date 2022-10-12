<?php

namespace PlaneLogixAPI\Api;

use Http\Client\Exception;
use PlaneLogixAPI\Api\Squawks\Documents;
use PlaneLogixAPI\Api\Squawks\Invites;
use PlaneLogixAPI\Api\Squawks\Messages;
use PlaneLogixAPI\Api\Squawks\Products;
use PlaneLogixAPI\Entity\Request\Squawk as SquawkRequest;
use PlaneLogixAPI\Entity\Squawk;
use PlaneLogixAPI\Entity\SquawkDocumentType as SquawkDocumentTypeEntity;
use PlaneLogixAPI\Entity\SquawkPriorityType as SquawkPriorityTypeEntity;
use PlaneLogixAPI\Entity\SquawkStatusType as SquawkStatusTypeEntity;
use PlaneLogixAPI\Exception\ExceptionInterface;

final class Squawks extends AbstractApi
{
    private Documents $documents;

    private Invites $invites;

    private Messages $messages;

    private Products $products;

    public function documents(): Documents
    {
        if (!isset($this->documents)) {
            $this->documents = new Documents($this->getClient());
        }

        return $this->documents;
    }

    public function invites(): Invites
    {
        if (!isset($this->invites)) {
            $this->invites = new Invites($this->getClient());
        }

        return $this->invites;
    }

    public function messages(): Messages
    {
        if (!isset($this->messages)) {
            $this->messages = new Messages($this->getClient());
        }

        return $this->messages;
    }

    public function products(): Products
    {
        if (!isset($this->products)) {
            $this->products = new Products($this->getClient());
        }

        return $this->products;
    }

    /**
     * @return SquawkStatusTypeEntity[]
     * @throws Exception
     * @throws ExceptionInterface
     */
    public function statusTypes(): array
    {
        $types = $this->get('/v2/aircraft-squawk-statuses');

        return array_map(fn($type) => new SquawkStatusTypeEntity($type), (array) $types);
    }

    /**
     * @return SquawkPriorityTypeEntity[]
     * @throws Exception
     * @throws ExceptionInterface
     */
    public function priorityTypes(): array
    {
        $types = $this->get('/v2/aircraft-squawk-priorities');

        return array_map(fn($type) => new SquawkPriorityTypeEntity($type), (array) $types);
    }

    /**
     * @return SquawkDocumentTypeEntity[]
     * @throws Exception
     * @throws ExceptionInterface
     */
    public function documentTypes(): array
    {
        $types = $this->get('/document-types');

        return array_map(fn($type) => new SquawkDocumentTypeEntity($type), (array) $types);
    }

    /**
     * @return Squawk[]
     *
     * @throws Exception
     * @throws ExceptionInterface
     */
    public function listSquawks(string $aircraftId): array
    {
        $squawks = $this->get("/v2/aircraft-squawk/{$aircraftId}/list");

        return array_map(fn($squawk) => new Squawk($squawk), (array) $squawks);
    }

    /**
     * Generate a new squawk for your aircraft.
     *
     * @param SquawkRequest $request
     *
     * @return Squawk
     * @throws Exception
     * @throws ExceptionInterface
     */
    public function create(SquawkRequest $request): Squawk
    {
        $squawk = $this->post('/v2/aircraft-squawk', $request->getRequestData());

        return new Squawk($squawk);
    }

    /**
     * Edit a squawk
     *
     * @throws Exception
     * @throws ExceptionInterface
     */
    public function update(string $aircraftSquawkId, SquawkRequest $request): Squawk
    {
        $requestData = $request->getRequestData();
        $requestData['_method'] = 'PUT';

        $squawk = $this->post("/v2/aircraft-squawk/{$aircraftSquawkId}", $requestData);

        return new Squawk($squawk);
    }

    /**
     * Delete a squawk
     *
     * @throws Exception
     */
    public function remove(string $aircraftSquawkId)
    {
        $this->delete("/v2/aircraft-squawk/{$aircraftSquawkId}");
    }

    /**
     * Delete a squawk
     *
     * @throws Exception
     * @throws ExceptionInterface
     */
    public function markComplete(string $aircraftSquawkId)
    {
        $this->get("/v2/aircraft-squawk/mark-complete/{$aircraftSquawkId}");
    }
}
