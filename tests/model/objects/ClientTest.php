<?php
use PHPUnit\Framework\TestCase;
use gsb_prospects\model\objects\Client;
use gsb_prospects\model\objects\Prestation;

/**
 * @covers gsb_prospects\model\objects\Client
 */
final class ClientTest extends TestCase
{
    protected $object;

    protected function setUp()
    {
        $this->object = new Client(0, "nom","prenom","adresse");
    }

    public function testNew()
    {
        $expected = Client::class;
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

    public function testGetPrestations()
    {
        $expected = array();
        $this->assertEquals(
            $expected,
            $this->object->getPrestations()
        );
    }

    /**
     * @depends testGetPrestations
     */
    public function testSetPrestations()
    {
        $expected = [
            new Prestation(1, "test1"),
            new Prestation(2, "test2"),
        ];
        $this->object->setPrestations($expected);
        $this->assertEquals(
            $expected,
            $this->object->getPrestations()
        );
    }

    /**
     * @depends testGetPrestations
     */
    public function testAddPrestation()
    {
        $expected = [];

        $instance = new Prestation(1, "test1");
        $this->object->addPrestation($instance);
        $expected[] = $instance;

        $instance = new Prestation(2, "test2");
        $this->object->addPrestation($instance);
        $expected[] = $instance;

        $this->assertEquals(
            $expected,
            $this->object->getPrestations()
        );
    }

    /**
     * @depends testGetPrestations
     * @depends testSetPrestations
     */
    public function testRemovePrestationByIndex()
    {
        $instance1 = new Prestation(1, "test1");
        $instance2 = new Prestation(2, "test2");
        $instance3 = new Prestation(3, "test3");
        $instance4 = new Prestation(4, "test4");
        $instance5 = new Prestation(5, "test5");
        $instances = [ $instance1, $instance2, $instance3, $instance4, $instance5 ];
        $this->object->setPrestations($instances);
        $this->object->removePrestation(0);
        $this->object->removePrestation(1);
        $this->object->removePrestation(2);
        $expected =  [ $instance2, $instance4 ];

        $this->assertEquals(
            $expected,
            $this->object->getPrestations()
        );
    }

    /**
     * @depends testGetPrestations
     * @depends testSetPrestations
     */
    public function testRemovePrestationByInstance()
    {
        $instance1 = new Prestation(1, "test1");
        $instance2 = new Prestation(2, "test2");
        $instance3 = new Prestation(3, "test3");
        $instance4 = new Prestation(4, "test4");
        $instance5 = new Prestation(5, "test5");
        $instances = [ $instance1, $instance2, $instance3, $instance4, $instance5 ];
        $this->object->setPrestations($instances);
        $this->object->removePrestation($instance1);
        $this->object->removePrestation($instance3);
        $this->object->removePrestation($instance5);
        $expected =  [ $instance2, $instance4 ];

        $this->assertEquals(
            $expected,
            $this->object->getPrestations()
        );
    }

    /**
     * @depends testSetPrestations
     */
    public function testRemovePrestationOutOfBoundsException()
    {
        $exception = new OutOfBoundsException("index out of bounds");

        $this->expectException(get_class($exception));
        $this->expectExceptionMessage($exception->getMessage());
        $this->expectExceptionCode($exception->getCode());

        $instance1 = new Prestation(1, "test1");
        $instance2 = new Prestation(2, "test2");
        $instance3 = new Prestation(3, "test3");
        $instance4 = new Prestation(4, "test4");
        $instance5 = new Prestation(5, "test5");
        $instances = [ new Prestation(1, "test1"), new Prestation(2, "test2"), $instance3, $instance4, $instance5 ];
        $this->object->setPrestations($instances);
        $this->object->removePrestation(5);
    }

    /**
     * @depends testSetPrestations
     */
    public function testRemovePrestationInvalidArgumentExceptionInstanceNotFound()
    {
        $exception = new InvalidArgumentException("instance not found");

        $this->expectException(get_class($exception));
        $this->expectExceptionMessage($exception->getMessage());
        $this->expectExceptionCode($exception->getCode());

        $instance1 = new Prestation(1, "test1");
        $instance2 = new Prestation(2, "test2");
        $instance3 = new Prestation(3, "test3");
        $instance4 = new Prestation(4, "test4");
        $instance5 = new Prestation(5, "test5");
        $instances = [ $instance1, $instance2, $instance3, $instance4 ];
        $this->object->setPrestations($instances);
        $this->object->removePrestation($instance5);
    }

    /**
     * @depends testSetPrestations
     */
    public function testRemovePrestationInvalidArgumentExceptionBadParameter()
    {
        $exception = new InvalidArgumentException("parameter must be an index or an instance of Prestation");

        $this->expectException(get_class($exception));
        $this->expectExceptionMessage($exception->getMessage());
        $this->expectExceptionCode($exception->getCode());

        $instance1 = new Prestation(1, "test1");
        $instance2 = new Prestation(2, "test2");
        $instance3 = new Prestation(3, "test3");
        $instance4 = new Prestation(4, "test4");
        $instance5 = new Prestation(5, "test5");
        $instances = [ $instance1, $instance2, $instance3, $instance4, $instance5 ];
        $this->object->setPrestations($instances);
        $this->object->removePrestation(null);
    }
}