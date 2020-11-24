<?php


namespace Art\CatchphraseBundle\Tests;

use Art\CatchphraseBundle\GenerateCatchphrase;
use PHPUnit\Framework\TestCase;

class GenerateCatchphraseTest extends TestCase
{
    public function testGetCatchphrase()
    {
        $generateCatchphrase = new GenerateCatchphrase();
        $catchphrase = $generateCatchphrase->getCatchphrase();
        $this->assertNotNull($catchphrase);
    }
}