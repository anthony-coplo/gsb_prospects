<?php
use PHPUnit\Framework\TestCase;
use gsb_prospects\model\objects\Ville;

/**
 * @covers gsb_prospects\model\objects\Ville
 */
final class VilleTest extends TestCase
{
    protected $object;

    protected function setUp()
    {
        $this->object = new Ville(0, "nom","code postal");
    }

    public function testNew()
    {
        $expected = Ville::class;
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

    public function testGetCodePostal()
    {
        $expected = "code postal";
        $this->assertEquals(
            $expected,
            $this->object->getCodePostal()
        );
    }

    /**
     * @depends testGetCodePostal
     */
    public function testSetCodePostal()
    {
        $expected = "modified";
        $this->object->setCodePostal($expected);
        $this->assertEquals(
            $expected,
            $this->object->getCodePostal()
        );
    }
}