<?php

namespace Correios\Response;

use Correios\Response;

class Deadline extends Response
{
    /**
     * {@inheritdoc}
     */
    public function getResults(): array
    {
        return $this->response->CalcPrazoResult->Servicos->cServico ?? [];
    }

    /**
     * {@inheritdoc}
     */
    public function getType(): string
    {
        return 'DeadlineResponse';
    }
}
