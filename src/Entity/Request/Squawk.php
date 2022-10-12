<?php

namespace PlaneLogixAPI\Entity\Request;

use PlaneLogixAPI\Entity\Request\Squawk\Image;
use PlaneLogixAPI\Entity\Request\Squawk\Product;

final class Squawk extends AbstractRequestEntity
{
    /**
     * Title of your squawk.
     *
     * @param string $value
     *
     * @return void
     */
    public function setTitle(string $value)
    {
        $this->requestData['Title'] = $value;
    }

    /**
     * Int value of your aircraft ID
     *
     * @param string $value
     *
     * @return void
     */
    public function setAircraftId(string $value)
    {
        $this->requestData['AircraftID'] = $value;
    }

    /**
     * Current squawk status
     *
     * @param string $value
     *
     * @return void
     */
    public function setStatusId(string $value)
    {
        $this->requestData['StatusID'] = $value;
    }

    /**
     * Priority level
     *
     * @param string $value
     *
     * @return void
     */
    public function setPriorityId(string $value)
    {
        $this->requestData['PriorityID'] = $value;
    }

    /**
     * Date formatted like 'yyyy-mm-dd'
     *
     * @param string $value
     *
     * @return void
     */
    public function setSquawkDate(string $value)
    {
        $this->requestData['SquawkDate'] = $value;
    }

    /**
     * More information about your squawk
     *
     * @param string $value
     *
     * @return void
     */
    public function setDescription(string $value)
    {
        $this->requestData['Description'] = $value;
    }

    /**
     * String of comma separated emails that will receive invitations to view the squawks
     *
     * @param string $value
     *
     * @return void
     */
    public function setInvitations(string $value)
    {
        $this->requestData['Invitations'] = $value;
    }

    /**
     * Array of files to add to the squawk. Can be accompanied by array of equal length of ImageNotes
     *
     * @param Image[] $images
     *
     * @return void
     */
    public function setImages(array $images)
    {
        $this->requestData['Images'] = $images;
    }

    /**
     * Array of products by integer you want to assign to a squawk
     *
     * @param Product[] $products
     *
     * @return void
     */
    public function setProducts(array $products)
    {
        $this->requestData['Products'] = $products;
    }

    /**
     * Allows you to mark a squawk as private.
     * If marked as private, no one else can view your squawk.
     *
     * @param bool $value
     *
     * @return void
     */
    public function setIsPrivate(bool $value)
    {
        $this->requestData['IsPrivate'] = $value ? 'true' : 'false';
    }

    /**
     * Action taken to resolve the squawk, if any.
     *
     * @param string $value
     *
     * @return void
     */
    public function setActionTaken(string $value)
    {
        $this->requestData['ActionTaken'] = $value;
    }
}
