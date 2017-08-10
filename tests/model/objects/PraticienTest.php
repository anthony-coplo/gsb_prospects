<?php
use PHPUnit\Framework\TestCase;
use gsb_prospects\model\objects\Praticien;

/**
 * @covers gsb_prospects\model\objects\Praticien
 */
final class PraticienTest extends TestCase
{
    protected $object;

    protected function setUp()
    {
        $this->object = new Praticien(0, "nom","prenom","adresse");
    }

    public function testNew()
    {
        $expected = Praticien::class;
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

    public function testGetPrenom()
    {
        $expected = "prenom";
        $this->assertEquals(
            $expected,
            $this->object->getPrenom()
        );
    }

    /**
     * @depends testGetPrenom
     */
    public function testSetPrenom()
    {
        $expected = "modified";
        $this->object->setPrenom($expected);
        $this->assertEquals(
            $expected,
            $this->object->getPrenom()
        );
    }

    public function testGetAdresse()
    {
        $expected = "adresse";
        $this->assertEquals(
            $expected,
            $this->object->getAdresse()
        );
    }

    /**
     * @depends testGetAdresse
     */
    public function testSetAdresse()
    {
        $expected = "modified";
        $this->object->setAdresse($expected);
        $this->assertEquals(
            $expected,
            $this->object->getAdresse()
        );
    }

    public function testGetIdVille()
    {
        $expected = 0;
        $this->assertEquals(
            $expected,
            $this->object->getIdVille()
        );
    }

    public function testGetIdTypePraticien()
    {
        $expected = 0;
        $this->assertEquals(
            $expected,
            $this->object->getIdTypePraticien()
        );
    }
}