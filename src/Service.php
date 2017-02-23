<?php

namespace Correios;

use Correios\Exception\AssignmentException;

class Service
{
    /**
     * The model attributes.
     *
     * @var array
     */
    private $attributes = [];

    /**
     * Create a new service instance.
     *
     * @param \stdClass $attributes
     */
    public function __construct(\stdClass $attributes)
    {
        foreach ($attributes as $key => $value) {
            $this->attributes[$key] = $value;
        }
    }

    /**
     * Retrieve a service attribute.
     *
     * @param string $key
     * @return mixed
     */
    public function getAttribute($key)
    {
        return $this->attributes[$key] ?? null;
    }

    /**
     * Dynamically retrieve a service attribute.
     *
     * @param string $key
     * @return mixed
     */
    public function __get($key)
    {
        return $this->getAttribute($key);
    }

    /**
     * Dynamically set an attribute.
     *
     * @param string $key
     * @param mixed $value
     * @throws AssignmentException
     */
    public function __set($key, $value)
    {
        throw new AssignmentException(
            sprintf('Cannot assign the value %s to the %s property.', $key, $value)
        );
    }
}
