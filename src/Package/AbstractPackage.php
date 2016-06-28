<?php

namespace Correios\Package;

abstract class AbstractPackage
{
    /**
     * The original object.
     *
     * @var \stdClass
     */
    private $original;

    /**
     * The attributes after a conversion.
     *
     * @var array
     */
    private $attributes = [];

    /**
     * The conversion rules.
     *
     * @var array
     */
    public $conversions = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    public $casts = [];

    /**
     * Create a new instance of a package.
     *
     * @param  \stdClass  $service
     */
    public function __construct(\stdClass $service)
    {
        $this->original = $service;

        $this->convert();
    }

    /**
     * Convert the original object properties into an array
     * and put into the $attributes array.
     *
     * @return void
     */
    protected function convert()
    {
        foreach ($this->conversions as $attribute => $property) {
            if (! $this->hasOriginal($property)) {
                continue;
            }

            $this->setAttribute($attribute, $this->getOriginal($property));
        }
    }

    /**
     * Cast the attribute before set it to the $attributes array.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return void
     */
    protected function setAttribute($attribute, $value)
    {
        if ($this->hasCast($attribute)) {
            $value = $this->castAttribute($attribute, $value);
        }

        $this->attributes[$attribute] = $value;
    }

    /**
     * Get a converted attribute from the $attributes array.
     *
     * @param  string  $attribute
     * @return mixed
     */
    protected function getAttribute($attribute)
    {
        return array_key_exists($attribute, $this->attributes) ? $this->attributes[$attribute] : null;
    }

    /**
     * Get a property of the original object.
     *
     * @param  string  $property
     * @return \stdClass
     */
    public function getOriginal($property)
    {
        if ($this->hasOriginal($property)) {
            return $this->original->$property;
        }
    }

    /**
     * Check if the orginal object has the given property.
     *
     * @param  string  $property
     * @return bool
     */
    protected function hasOriginal($property)
    {
        return property_exists($this->original, $property);
    }

    /**
     * Get a the conversion for the given attribute.
     *
     * @param  string  $attribute
     * @return mixed
     */
    protected function getConversion($attribute)
    {
        if ($this->hasConversion($attribute)) {
            return $this->conversions[$attribute];
        }
    }

    /**
     * Check if the given attribute has a conversion.
     *
     * @param  string  $attribute
     * @return bool
     */
    protected function hasConversion($attribute)
    {
        return array_key_exists($attribute, $this->conversions);
    }
    /**
     * Get the type of cast for an attribute.
     *
     * @param  $attribute
     * @return string
     */
    protected function getCast($attribute)
    {
        if ($this->hasCast($attribute)) {
            return $this->casts[$attribute];
        }
    }

    /**
     * Check if the given attribute should be cast to a native type.
     *
     * @param  string  $attribute
     * @return bool
     */
    protected function hasCast($attribute)
    {
        return array_key_exists($attribute, $this->casts);
    }

    /**
     * Cast an attribute to a php native type.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return mixed
     */
    protected function castAttribute($attribute, $value)
    {
        if (is_null($value)) {
            return $value;
        }

        $cast = $this->getCast($attribute);

        switch ($cast) {
            case 'int':
            case 'integer':
                return (int) $value;
            case 'real':
            case 'float':
            case 'double':
                return (float) $value;
            case 'string':
                return (string) $value;
            case 'bool':
            case 'boolean':
                return (bool) $value;
            case 'special':
                return $value === 'S';
            default:
                return $value;
        }
    }

    /**
     * Convert the package instance to an array.
     *
     * @return array
     */
    public function toArray()
    {
        return [];
    }

    /**
     * Retrieve the converted attributes on the package.
     *
     * @param  string  $attribute
     * @return mixed
     */
    public function __get($attribute)
    {
        return $this->getAttribute($attribute);
    }

    /**
     * Set attributes on the package.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return void
     */
    public function __set($attribute, $value)
    {
        $this->setAttribute($attribute, $value);
    }
}