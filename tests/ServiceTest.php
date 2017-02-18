<?php

use Correios\Service;

class ServiceTest extends TestBase
{
    /**
     * The default parameter.
     *
     * @var \stdClass
     */
    private $parameter;

    public function setUp()
    {
        parent::setUp();

        $parameter = new \stdClass();
        $parameter->a = 'a';
        $parameter->b = 'b';
        $parameter->c = 'c';

        $this->parameter = $parameter;
    }

    /**
     * @expectedException TypeError
     */
    public function testCannotBeCreatedWithoutParameters()
    {
        $service = new Service();
    }

    public function testCanBeCreatedWithParameters()
    {
        $service = new Service($this->parameter);

        $this->assertInstanceOf(Service::class, $service);
    }

    public function testShouldHaveAttributesProperty()
    {
        $service = new Service($this->parameter);

        $this->assertObjectHasAttribute('attributes', $service);
    }

    public function testShouldRetrieveAttributes()
    {
        $service = new Service($this->parameter);

        $this->assertEquals('a', $service->getAttribute('a'));
        $this->assertEquals('b', $service->getAttribute('b'));
        $this->assertEquals('c', $service->getAttribute('c'));
    }

    public function testShouldDynamicallyRetrieveAttributes()
    {
        $service = new Service($this->parameter);

        $this->assertEquals('a', $service->a);
        $this->assertEquals('b', $service->b);
        $this->assertEquals('c', $service->c);
    }

    public function testShouldReturnNull()
    {
        $service = new Service($this->parameter);

        $this->assertEquals(null, $service->getAttribute('d'));
        $this->assertEquals(null, $service->getAttribute('e'));
        $this->assertEquals(null, $service->f);
        $this->assertEquals(null, $service->g);
    }

    public function tearDown()
    {
        parent::tearDown();

        $this->parameter = null;
    }
}
