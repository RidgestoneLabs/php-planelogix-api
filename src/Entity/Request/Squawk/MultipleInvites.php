<?php

namespace PlaneLogixAPI\Entity\Request\Squawk;

use PlaneLogixAPI\Entity\Request\AbstractRequestEntity;

final class MultipleInvites extends AbstractRequestEntity
{
    /**
     * @param string $value
     *
     * @return $this
     */
    public function addEmail(string $value): Invite
    {
        $count = count($this->requestData);
        $newIndex = $count + 1;

        $this->requestData["Email[{$newIndex}]"] = $value;

        return $this;
    }

    public function setEmails(array $emailAddresses)
    {
        $data = [];

        foreach ($emailAddresses as $index => $emailAddress) {
            $data["EmailList[{$index}]"] = $emailAddress;
        }

        $this->requestData = $data;
    }
}
