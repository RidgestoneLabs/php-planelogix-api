<?php

namespace PlaneLogixAPI\Api\Squawks;

use Http\Client\Exception;
use PlaneLogixAPI\Api\AbstractApi;
use PlaneLogixAPI\Entity\Request\Squawk\Product as ProductRequest;
use PlaneLogixAPI\Entity\Squawk\Product;
use PlaneLogixAPI\Exception\ExceptionInterface;

final class Products extends AbstractApi
{
    /**
     * Allows you to add products to the squawk.
     *
     * @throws Exception
     * @throws ExceptionInterface
     */
    public function create(string $aircraftSquawkId, ProductRequest $request): Product
    {
        $message = $this->post("/v2/aircraft-squawk/{$aircraftSquawkId}/products", $request->getRequestData());

        return new Product($message);
    }

    /**
     * @throws Exception
     */
    public function remove(string $aircraftSquawkId, string $squawkProductId): void
    {
        $this->delete("/v2/aircraft-squawk/{$aircraftSquawkId}/products/{$squawkProductId}");
    }
}
