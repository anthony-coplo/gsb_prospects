<?php
use PHPUnit\Framework\TestCase;
use gsb_prospects\model\dao\DAOException;
use gsb_prospects\model\dao\VilleDAO;
use gsb_prospects\model\objects\Ville;

/**
 * @covers gsb_prospects\model\dao\VilleDAO
 */
final class VilleDAOTest extends TestCase
{
    protected $object;

    protected function setUp()
    {
        $this->object = new VilleDAO();
    }

    /**
     * @dataProvider findProvider
     */
    public function testFind($id, $nom, $code_postal)
    {
        $result = $this->object->find($id);

        $this->assertInstanceOf(Ville::class, $result);

        $this->assertEquals($id, $result->getId());
        $this->assertEquals($nom, $result->getNom());
        $this->assertEquals($code_postal, $result->getCodePostal());
    }
    
    public function testFindException()
    {
        $this->expectException(DAOException::class);
        $this->expectExceptionMessage("unknown id 0");
        $this->expectExceptionCode(0);

        $result = $this->object->find(0);
    }

    public function testFindAll()
    {
        $results = $this->object->findAll();

        $count = count($results);
        $expected_count = 77;
        $this->assertEquals($expected_count, $count);

        $sliced_array = array_slice($results, 0, 5);
        $expected = [
            new Ville('1', "LA ROCHE SUR YON", "85000"),
            new Ville('2', "BLOIS", "41000"),
            new Ville('3', "BESANCON", "25000"),
            new Ville('4', "BEAUVAIS", "60000"),
            new Ville('5', "NIMES", "30000"),
        ];
        $this->assertEquals($expected, $sliced_array);
    }

    /**
     * @dataProvider findFromPraticienProvider
     */
     public function testFindFromPraticien($id, $row)
     {
         $results = $this->object->findFromPraticien($id);
 
         $reflectedClass = new ReflectionClass("gsb_prospects\model\objects\Ville");
         $object = $reflectedClass->newInstanceArgs($row);
         $expected = $object;
 
         $this->assertEquals($expected, $results);
     }

     public function findProvider()
    {
        return [
            [ '1', "LA ROCHE SUR YON", "85000" ],
            [ '2', "BLOIS", "41000" ],
            [ '3', "BESANCON", "25000" ],
            [ '4', "BEAUVAIS", "60000" ],
            [ '5', "NIMES", "30000" ],
        ];
    }

    public function findFromPraticienProvider()
    {
        return [
            [ '1',  [ '1', "LA ROCHE SUR YON", "85000" ] ],
            [ '2',  [ '2', "BLOIS", "41000" ] ],
            [ '24', [ '2', "BLOIS", "41000" ] ],
            [ '3',  [ '3', "BESANCON", "25000" ] ],
            [ '4',  [ '4', "BEAUVAIS", "60000" ] ],
        ];
    }
}