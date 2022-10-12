<?php

namespace PlaneLogixAPI\Api;

use Http\Client\Exception;
use PlaneLogixAPI\Entity\Request\TrackingItem as TrackingItemRequest;
use PlaneLogixAPI\Entity\Request\TrackingItemMarkCompliedWith as TrackingItemMarkCompliedWithRequest;
use PlaneLogixAPI\Entity\TrackingEventType as TrackingEventTypeEntity;
use PlaneLogixAPI\Entity\TrackingItem as TrackingItemEntity;
use PlaneLogixAPI\Exception\ExceptionInterface;

final class TrackingItems extends AbstractApi
{
    /**
     * @return TrackingEventTypeEntity[]
     * @throws Exception
     * @throws ExceptionInterface
     */
    public function eventTypes(): array
    {
        $eventTypes = $this->get('/v2/tracking-event-types');

        return array_map(fn($eventType) => new TrackingEventTypeEntity($eventType), (array) $eventTypes);
    }

    /**
     * @return TrackingItemEntity[]
     * @throws Exception
     * @throws ExceptionInterface
     */
    public function trackingItems(string $aircraftId): array
    {
        $trackingItems = $this->get("/v2/trackingitems/{$aircraftId}");

        return array_map(fn($trackingItem) => new TrackingItemEntity($trackingItem), (array) $trackingItems);
    }

    /**
     * Allows you to assign a maintenance record to a tracking item.
     *
     * @throws Exception
     * @throws ExceptionInterface
     */
    public function assignMxRecordToTrackingItem(string $trackingItemId, string $maintenanceRecordId): void
    {
        $this->post("/v2/trackingitems/{$trackingItemId}/{$maintenanceRecordId}");
    }

    /**
     * @throws Exception
     * @throws ExceptionInterface
     */
    public function markRecordCompliedWith(string $trackingItemId, TrackingItemMarkCompliedWithRequest $request): void
    {
        $this->post("/v2/trackingitem-markcompliedwith/{$trackingItemId}", $request->getRequestData());
    }

    /**
     * @throws Exception
     * @throws ExceptionInterface
     */
    public function create(string $logbookId, TrackingItemRequest $request): void
    {
        $this->post("/v2/trackingitems/{$logbookId}", $request->getRequestData());
    }

    /**
     * @throws Exception
     */
    public function remove(string $trackingItemId): void
    {
        $this->delete("/v2/trackingitem/{$trackingItemId}");
    }
}
