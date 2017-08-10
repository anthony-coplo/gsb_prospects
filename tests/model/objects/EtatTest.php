<?php
use PHPUnit\Framework\TestCase;
use gsb_prospects\model\objects\Etat;

/**
 * @covers gsb_prospects\model\objects\Etat
 */
final class EtatTest extends TestCase
{
    protected $object;

    protected function setUp()
    {
        $this->object = new Etat(0, "nom");
    }

    public function testNew()
    {
        $expected = Etat::class;
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