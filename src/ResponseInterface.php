<?php

namespace Correios;

interface ResponseInterface
{
    /**
     * Return an array of services.
     *
     * @return array
     */
    public function getServices(): array;

    /**
     * Return the type of the response as a string.
     *
     * @return string
     */
    public function getType(): string;
}
