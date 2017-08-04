<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use gsb_prospects\model\objects\TypePraticien;

/**
 * @covers gsb_prospects\model\objects\TypePraticien
 */
final class TypePraticienTest extends TestCase
{
    protected $object;

    protected function setUp()
    {
        $this->object = new TypePraticien("code","libelle","lieu");
    }

    public function testNew()
    {
        $expected = TypePraticien::class;
        $this->assertInstanceOf(
            $expected,
            $this->object
        );
    }

    public function testGetCode()
    {
        $expected = "code";
        $this->assertEquals(
            $expected,
            $this->object->getCode()
        );
    }

    public function testSetCode()
    {
        $expected = "modified";
        $this->object->setCode($expected);
        $this->assertEquals(
            $expected,
            $this->object->getCode()
        );
    }

    public function testGetLibelle()
    {
        $expected = "libelle";
        $this->assertEquals(
            $expected,
            $this->object->getLibelle()
        );
    }

    public function testSetLibelle()
    {
        $expected = "modified";
        $this->object->setLibelle($expected);
        $this->assertEquals(
            $expected,
            $this->object->getLibelle()
        );
    }

    public function testGetLieu()
    {
        $expected = "lieu";
        $this->assertEquals(
            $expected,
            $this->object->getLieu()
        );
    }

    public function testSetLieu()
    {
        $expected = "modified";
        $this->object->setLieu($expected);
        $this->assertEquals(
            $expected,
            $this->object->getLieu()
        );
    }
}