<?php

namespace Correios\Response;

interface ResponseInterface
{
    /**
     * Return an array of services from response.
     *
     * @return array
     */
    public function getServices();

    /**
     * Return the type of the response as string.
     *
     * @return string
     */
    public function getType();
}