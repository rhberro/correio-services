<?php

namespace Correios\Response;

use Correios\Response;

class DeadlinePrice extends Response
{
    /**
     * {@inheritdoc}
     */
    public function getResults(): array
    {
        return $this->response->CalcPrecoPrazoResult->Servicos->cServico ?? [];
    }

    /**
     * {@inheritdoc}
     */
    public function getType(): string
    {
        return 'DeadlinePriceResponse';
    }
}
