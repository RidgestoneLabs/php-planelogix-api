<?php

namespace PlaneLogixAPI\Api\Squawks;

use Http\Client\Exception;
use PlaneLogixAPI\Api\AbstractApi;
use PlaneLogixAPI\Entity\Request\Squawk\Invite as InviteRequest;
use PlaneLogixAPI\Entity\Request\Squawk\MultipleInvites as MultipleInvitesRequest;
use PlaneLogixAPI\Entity\Squawk\Invite;
use PlaneLogixAPI\Exception\ExceptionInterface;

final class Invites extends AbstractApi
{
    /**
     * @return Invite[]
     *
     * @throws Exception
     * @throws ExceptionInterface
     */
    public function listInvites(string $aircraftSquawkId): array
    {
        $invites = $this->get("/v2/aircraft-squawk/{$aircraftSquawkId}/invites");

        return array_map(fn($invite) => new Invite($invite), (array) $invites);
    }

    /**
     * Sends an email to the address you provide inviting them to view the squawk.
     *
     * @throws Exception
     * @throws ExceptionInterface
     */
    public function invite(string $aircraftSquawkId, InviteRequest $request): Invite
    {
        $message = $this->post("/v2/aircraft-squawk/{$aircraftSquawkId}/invites", $request->getRequestData());

        return new Invite($message);
    }

    /**
     * Allows you to send multiple invitations at once.
     *
     * @return Invite[]
     *
     * @throws Exception
     * @throws ExceptionInterface
     */
    public function multipleInvites(string $aircraftSquawkId, MultipleInvitesRequest $request): array
    {
        $invites = $this->post("/v2/aircraft-squawk/{$aircraftSquawkId}/multiple-invites", $request->getRequestData());

        return array_map(fn($invite) => new Invite($invite), (array) $invites);
    }

    /**
     * @throws Exception
     */
    public function remove(string $aircraftSquawkId, string $inviteId): void
    {
        $this->delete("/v2/aircraft-squawk/{$aircraftSquawkId}/invites/{$inviteId}");
    }
}
