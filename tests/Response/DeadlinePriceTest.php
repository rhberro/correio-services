<?php

use Correios\Response\DeadlinePrice;

class DeadlinePriceTest extends TestBase
{
    /**
     * The default parameter.
     *
     * @var array
     */
    private $parameter;

    public function setUp()
    {
        parent::setUp();

        $parameter = new \stdClass();
        $parameter->CalcPrecoPrazoResult = new \stdClass();
        $parameter->CalcPrecoPrazoResult->Servicos = new \stdClass();
        $parameter->CalcPrecoPrazoResult->Servicos->cServico = Array();

        $this->parameter = $parameter;
    }

    public function testShouldRetrieveType()
    {
        $response = new DeadlinePrice($this->parameter);

        $this->assertEquals('DeadlinePriceResponse', $response->getType());
    }

    public function testShouldRetrieveServices()
    {
        $response = new DeadlinePrice($this->parameter);

        $this->assertEquals([], $response->getServices());
        $this->assertCount(0, $response->getServices());
    }

    public function tearDown()
    {
        parent::tearDown();

        $this->parameter = null;
    }
}
