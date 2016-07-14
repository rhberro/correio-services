<?php

namespace Correios\Response;

use Correios\Package\Service\Common as Package;

abstract class AbstractResponse implements ResponseInterface
{
    /**
     * The request result.
     *
     * @var \stdClass
     */
    private $result;

    /**
     * Create a new response instance.
     *
     * @param \stdClass $result
     */
    public function __construct(\stdClass $result)
    {
        $this->result = $result;
    }

    /**
     * Get the request result of the response instance.
     *
     * @return \stdClass
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * {@inheritdoc}
     */
    public function getServices()
    {
        return [];
    }

    /**
     * Get the array of packages from this response.
     *
     * @return array
     */
    final public function getPackages()
    {
        $services = $this->getServices();

        return array_map(function ($service) {
            return new Package($service);
        }, $services);
    }

    /**
     * {@inheritdoc}
     */
    public function getType()
    {
        return 'AbstractResponse';
    }
}
