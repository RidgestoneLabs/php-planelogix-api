<?php

namespace PlaneLogixAPI\Entity;

use ReflectionClass;
use ReflectionException;
use ReflectionProperty;

abstract class AbstractEntity
{
    /**
     * @param object|array|null $parameters
     *
     * @return void
     */
    public function __construct($parameters = null)
    {
        if ($parameters === null) {
            return;
        }

        if (is_object($parameters)) {
            $parameters = get_object_vars($parameters);
        }

        $this->build($parameters);
    }

    /**
     * @param string $property
     *
     * @return mixed
     */
    public function __get(string $property)
    {
        if (property_exists($this, $property)) {
            return $this->{$property};
        }

        $trace = debug_backtrace();

        trigger_error(
            sprintf(
                'Undefined property %s in %s on line %s',
                $property,
                $trace[0]['file'],
                $trace[0]['line']
            )
        );

        return null;
    }

    /**
     * @param array $parameters
     *
     * @return void
     */
    public function build(array $parameters): void
    {
        foreach ($parameters as $property => $value) {
            if (property_exists($this, $property)) {
                $this->$property = $value;
            }
        }
    }

    /**
     * @return array
     * @throws ReflectionException
     */
    public function toArray(): array
    {
        $settings = [];
        $called = static::class;

        $reflection = new ReflectionClass($called);
        $properties = $reflection->getProperties(ReflectionProperty::IS_PUBLIC);

        foreach ($properties as $property) {
            $prop = $property->getName();

            if (isset($this->$prop) && $property->class == $called) {
                $settings[$prop] = $this->$prop;
            }
        }

        return $settings;
    }
}
