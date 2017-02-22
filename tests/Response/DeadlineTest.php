<?php

use Correios\Response\Deadline;

class DeadlineTest extends TestBase
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
        $parameter->CalcPrazoResult = new \stdClass();
        $parameter->CalcPrazoResult->Servicos = new \stdClass();
        $parameter->CalcPrazoResult->Servicos->cServico = Array();

        $this->parameter = $parameter;
    }

    public function testShouldRetrieveType()
    {
        $response = new Deadline($this->parameter);

        $this->assertEquals('DeadlineResponse', $response->getType());
    }

    public function testShouldRetrieveServices()
    {
        $response = new Deadline($this->parameter);

        $this->assertEquals([], $response->getServices());
        $this->assertCount(0, $response->getServices());
    }

    public function tearDown()
    {
        parent::tearDown();

        $this->parameter = null;
    }
}
