<?php

namespace Correios\Response\Service;

use Correios\Response\AbstractResponse;

class PriceDeadline extends AbstractResponse
{
    /**
     * {@inheritdoc}
     */
    public function getServices()
    {
        $services = $this->getResult()->CalcPrecoPrazoResult->Servicos->cServico;

        return is_array($services) ? $services : [$services];
    }

    /**
     * {@inheritdoc}
     */
    public function getType()
    {
        return 'PriceDeadlineResponse';
    }
}
