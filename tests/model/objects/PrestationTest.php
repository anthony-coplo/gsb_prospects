<?php
use PHPUnit\Framework\TestCase;
use gsb_prospects\model\objects\Prestation;

/**
 * @covers gsb_prospects\model\objects\Prestation
 */
final class PrestationTest extends TestCase
{
    protected $object;

    protected function setUp()
    {
        $this->object = new Prestation(0, "nom");
    }

    public function testNew()
    {
        $expected = Prestation::class;
        $this->assertInstanceOf(
            $expected,
            $this->object
        );
    }

    public function testGetId()
    {
        $expected = 0;
        $this->assertEquals(
            $expected,
            $this->object->getId()
        );
    }

    public function testGetNom()
    {
        $expected = "nom";
        $this->assertEquals(
            $expected,
            $this->object->getNom()
        );
    }

    /**
     * @depends testGetNom
     */
    public function testSetNom()
    {
        $expected = "modified";
        $this->object->setNom($expected);
        $this->assertEquals(
            $expected,
            $this->object->getNom()
        );
    }
}