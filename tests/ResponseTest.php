<?php

use Correios\Response\Service\Deadline;
use Correios\Response\Service\Price;
use Correios\Response\Service\PriceDeadline;

class ResponseTest extends TestBase
{
    public function testSuccessPriceDeadlineResponse()
    {
        $result = $this->callSimplePriceDeadline();
        $this->assertInstanceOf(PriceDeadline::class, $result);

        $type = $result->getType();
        $this->assertEquals($type, 'PriceDeadlineResponse');
    }

    public function testSuccessPriceResponse()
    {
        $result = $this->callSimplePrice();
        $this->assertInstanceOf(Price::class, $result);

        $type = $result->getType();
        $this->assertEquals($type, 'PriceResponse');
    }

    public function testSuccessDeadlineResponse()
    {
        $result = $this->callSimpleDeadline();
        $this->assertInstanceOf(Deadline::class, $result);

        $type = $result->getType();
        $this->assertEquals($type, 'DeadlineResponse');
    }
}