<?php

namespace PlaneLogixAPI\Entity\Request\Squawk;

use PlaneLogixAPI\Entity\Request\AbstractRequestEntity;

final class Image extends AbstractRequestEntity
{
    /**
     * @param             $image
     * @param string|null $note
     *
     * @return $this
     */
    public function setImage($image, string $note = null): Image
    {
        $this->requestData['Image'] = $image;
        $this->requestData['Note'] = $note;

        return $this;
    }
}
