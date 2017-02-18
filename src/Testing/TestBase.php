<?php

namespace Correios\Testing;

use Correios\Request;

class TestBase extends \PHPUnit_Framework_TestCase
{
    /**
     * The request instance to be used with the tests.
     *
     * @var \Correios\Request;
     */
    protected $request;

    /**
     * Setup the test environment.
     *
     * @return void
     */
    public function setUp()
    {
        if (! $this->request) {
            $this->request = new Request();
        }
    }

    /**
     * Clean up the testing environment before the next test.
     */
    public function tearDown()
    {
        $this->request = null;
    }
}
