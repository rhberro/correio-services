<?php

class ServiceStatusTest extends TestBase
{
    public function testIfPriceDeadlineServiceIsUp()
    {
        $result = $this->callSimplePriceDeadline();
        $this->assertCount(1, $result->getPackages());
    }

    public function testIfPriceServiceIsUp()
    {
        $result = $this->callSimplePrice();
        $this->assertCount(1, $result->getPackages());
    }

    public function testIfDeadlineServiceIsUp()
    {
        $result = $this->callSimpleDeadline();
        $this->assertCount(1, $result->getPackages());
    }
}
