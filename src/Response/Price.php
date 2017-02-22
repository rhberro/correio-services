<?php

namespace Correios\Response;

use Correios\Response;

class Price extends Response
{
    /**
     * {@inheritdoc}
     */
    public function getResults(): array
    {
        return $this->response->CalcPrecoResult->Servicos->cServico ?? [];
    }

    /**
     * {@inheritdoc}
     */
    public function getType(): string
    {
        return 'PriceResponse';
    }
}
