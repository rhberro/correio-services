<?php

namespace Correios;

class Service {
    /**
     * The model attributes.
     *
     * @var array
     */
    public $attributes = [];

    /**
     * Create a new service instance.
     *
     * @param  \stdClass  $attributes
     */
    public function __construct(\stdClass $attributes)
    {
        foreach ($attributes as $key => $value) {
            $this->attributes[$key] = $value;
        }
    }

    /**
     * Retrieve a model attribute.
     *
     * @param  string  $key
     * @return mixed
     */
    public function getAttribute($key)
    {
        return $this->attributes[$key] ?? null;
    }

    /**
     * Dynamically retrieve a model attribute.
     *
     * @param  string  $key
     * @return mixed
     */
    public function __get($key)
    {
        return $this->getAttribute($key);
    }
}
