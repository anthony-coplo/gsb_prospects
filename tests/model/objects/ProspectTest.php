<?php
use PHPUnit\Framework\TestCase;
use gsb_prospects\model\objects\Prospect;
use gsb_prospects\model\objects\Etat;

/**
 * @covers gsb_prospects\model\objects\Prospect
 */
final class ProspectTest extends TestCase
{
    protected $object;

    protected function setUp()
    {
        $this->object = new Prospect(null, null, 0, "nom","prenom","adresse");
    }

    public function testNew()
    {
        $expected = Prospect::class;
        $this->assertInstanceOf(
            $expected,
            $this->object
        );
    }

    public function testGetIdEtat()
    {
        $expected = 0;
        $this->assertEquals(
            $expected,
            $this->object->getIdEtat()
        );
    }

    public function testGetEtat()
    {
        $expected = null;
        $this->assertEquals(
            $expected,
            $this->object->getEtat()
        );
    }

    /**
     * @depends testGetEtat
     */
    public function testSetEtat()
    {
        $expected = new Etat(1, "nom");
        $this->object->setEtat($expected);
        $this->assertEquals(
            $expected,
            $this->object->getEtat()
        );
    }
}