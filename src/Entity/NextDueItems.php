<?php

namespace PlaneLogixAPI\Entity;

class NextDueItems extends AbstractEntity
{
    /**
     * @var NextDue\Item[]
     */
    public array $nextDueCycleItems;

    /**
     * @var NextDue\Item[]
     */
    public array $nextDueMeterItems;

    /**
     * @var NextDue\Item[]
     */
    public array $nextDueCalendarItems;

    public function build(array $parameters): void
    {
        foreach ($parameters as $property => $value) {
            switch ($property) {
                case 'nextDueCycleItems':
                case 'nextDueMeterItems':
                case 'nextDueCalendarItems':
                    if (\is_array($value)) {
                        $this->{$property} = [];

                        foreach ($value as $key => $data) {
                            if (\is_object($data)) {
                                $this->{$property}[$key] = new NextDue\Item($data);
                            }
                        }
                    }
                    break;
            }

            unset($parameters[$property]);
        }

        parent::build($parameters);
    }
}
