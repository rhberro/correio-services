<?php

class TestBase extends Correios\Testing\TestBase
{
    /**
     * Example of a simple price deadline call.
     *
     * @return \Correios\Response\Service\PriceDeadline
     */
    protected function callSimplePriceDeadline()
    {
        return $this->request->complete('13450044', '13466070', '1.2', '16', '21.8', '15.0', '15.0', '40010');
    }

    /**
     * Example of a simple price call.
     *
     * @return \Correios\Response\Service\Price
     */
    protected function callSimplePrice()
    {
        return $this->request->price('13450044', '13466070', '1.2', '16', '21.8', '15.0', '15.0', '40010');
    }

    /**
     * Example of a simple deadline call.
     *
     * @return \Correios\Response\Service\Deadline
     */
    protected function callSimpleDeadline()
    {
        return $this->request->deadline('13450044', '13466070', '40010');
    }
}
