<?php

use Correios\Package\Service\Common as Package;

class PackageTest extends TestBase
{
    public function testIfPackagesCanBeCreated()
    {
        $package = new Package(new stdClass());
        $this->assertInstanceOf(Package::class, $package);
    }

    public function testIfPackagesCanBeConvertedToArray()
    {
        $package = new Package(new stdClass());
        $this->assertTrue(is_array($package->toArray()));
    }

    public function testIfMagicMethodGetIsWorking()
    {
        $package = new Package(new stdClass());
        $this->assertNull($package->ThisPropertyDoesNotExists);
    }
}