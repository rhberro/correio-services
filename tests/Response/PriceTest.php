<?php

use Correios\Response\Price;

class PriceTest extends TestBase
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
        $parameter->CalcPrecoResult = new \stdClass();
        $parameter->CalcPrecoResult->Servicos = new \stdClass();
        $parameter->CalcPrecoResult->Servicos->cServico = Array();

        $this->parameter = $parameter;
    }

    public function testShouldRetrieveType()
    {
        $response = new Price($this->parameter);

        $this->assertEquals('PriceResponse', $response->getType());
    }

    public function testShouldRetrieveServices()
    {
        $response = new Price($this->parameter);

        $this->assertEquals([], $response->getServices());
        $this->assertCount(0, $response->getServices());
    }

    public function tearDown()
    {
        parent::tearDown();

        $this->parameter = null;
    }
}
