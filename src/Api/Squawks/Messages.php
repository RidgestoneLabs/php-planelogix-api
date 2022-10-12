<?php

namespace PlaneLogixAPI\Api\Squawks;

use Http\Client\Exception;
use PlaneLogixAPI\Api\AbstractApi;
use PlaneLogixAPI\Entity\Request\Squawk\Message as MessageRequest;
use PlaneLogixAPI\Entity\Squawk\Message;
use PlaneLogixAPI\Exception\ExceptionInterface;

final class Messages extends AbstractApi
{
    /**
     * @return Message[]
     *
     * @throws ExceptionInterface
     * @throws Exception
     */
    public function listMessages(string $aircraftSquawkId): array
    {
        $messages = $this->get("/v2/aircraft-squawk/{$aircraftSquawkId}/messages");

        return array_map(fn($message) => new Message($message), (array) $messages);
    }

    /**
     * @throws Exception
     * @throws ExceptionInterface
     */
    public function create(string $aircraftSquawkId, MessageRequest $request): Message
    {
        $message = $this->post("/v2/aircraft-squawk/{$aircraftSquawkId}/messages", $request->getRequestData());

        return new Message($message);
    }

    /**
     * @throws Exception
     * @throws ExceptionInterface
     */
    public function update(string $aircraftSquawkId, string $squawkMessageId, MessageRequest $request): Message
    {
        $requestData = $request->getRequestData();
        $requestData['_method'] = 'PUT';

        $message = $this->post("/v2/aircraft-squawk/{$aircraftSquawkId}/messages/{$squawkMessageId}", $requestData);

        return new Message($message);
    }

    /**
     * @throws Exception
     */
    public function remove(string $aircraftSquawkId, string $squawkMessageId): void
    {
        $this->delete("/v2/aircraft-squawk/{$aircraftSquawkId}/messages/{$squawkMessageId}");
    }
}
