<?php

namespace Correios\Response\Service;

use Correios\Response\AbstractResponse;

class Price extends AbstractResponse
{
    /**
     * {@inheritdoc}
     */
    public function getServices()
    {
        $services = $this->getResult()->CalcPrecoResult->Servicos->cServico;

        return is_array($services) ? $services : [$services];
    }

    /**
     * {@inheritdoc}
     */
    public function getType()
    {
        return 'PriceResponse';
    }
}
