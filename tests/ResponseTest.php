<?php

use Correios\Response;

class ResponseTest extends TestBase
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
        $parameter->a = 'a';
        $parameter->b = 'b';
        $parameter->c = 'c';

        $this->parameter = array($parameter);
    }

    /**
     * Create a mock for the abstract class.
     *
     * @return Response
     */
    private function getMockOfResponse(): Response
    {
        return $this->getMockForAbstractClass(Response::class, $this->parameter);
    }

    /**
     * @expectedException Error
     */
    public function testCannotInstantiateResponse()
    {
        $response = new Response();
    }

    /**
     * @expectedException TypeError
     */
    public function testCannotInstantiateWithoutParameters()
    {
        $this->getMockForAbstractClass(Response::class);
    }

    public function testCanInstantiateWithParameters()
    {
        $response = $this->getMockOfResponse();

        $this->assertInstanceOf(Response::class, $response);
    }

    public function testReturnEmptyArray()
    {
        $response = $this->getMockOfResponse();

        $services = $response->getServices();

        $this->assertEquals([], $services);
        $this->assertCount(0, $services);
    }

    public function tearDown()
    {
        parent::tearDown();

        $this->parameter = null;
    }
}
