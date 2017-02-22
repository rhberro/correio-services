<?php

namespace Correios;

use Correios\Service;

abstract class Response implements ResponseInterface
{
    /**
     * The original response.
     *
     * @var \stdClass
     */
    private $response;

    /**
     * Create a new response instance.
     *
     * @param \stdClass $response
     */
    public function __construct(\stdClass $response)
    {
        $this->response = $response;
    }

    /**
     * Return an array of results.
     *
     * @return array
     */
    public abstract function getResults(): array;

    /**
     * {@inheritdoc}
     */
    public function getServices(): array
    {
        $services = $this->getResults();

        return array_map(function ($service) {
            return new Service($service);
        }, $services);
    }

    /**
     * {@inheritdoc}
     */
    public abstract function getType(): string;
}
