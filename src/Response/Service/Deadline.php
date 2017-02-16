<?php

namespace Correios\Response\Service;

use Correios\Response\AbstractResponse;

class Deadline extends AbstractResponse
{
    /**
     * {@inheritdoc}
     */
    public function getServices()
    {
        $services = $this->getResult()->CalcPrazoResult->Servicos->cServico;

        return is_array($services) ? $services : [$services];
    }

    /**
     * {@inheritdoc}
     */
    public function getType()
    {
        return 'DeadlineResponse';
    }
}
