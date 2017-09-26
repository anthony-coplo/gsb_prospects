<?php
use PHPUnit\Framework\TestCase;
use gsb_prospects\model\dao\DAOException;
use gsb_prospects\model\dao\TypePraticienDAO;
use gsb_prospects\model\objects\TypePraticien;

/**
 * @covers gsb_prospects\model\dao\TypePraticienDAO
 */
final class TypePraticienDAOTest extends TestCase
{
    protected $object;

    protected function setUp()
    {
        $this->object = new TypePraticienDAO();
    }

    /**
     * @dataProvider findProvider
     */
    public function testFind($id, $code, $libelle, $lieu)
    {
        $result = $this->object->find($id);

        $this->assertInstanceOf(TypePraticien::class, $result);

        $this->assertEquals($id, $result->getId());
        $this->assertEquals($code, $result->getCode());
        $this->assertEquals($libelle, $result->getLibelle());
        $this->assertEquals($lieu, $result->getLieu());
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
        $result = $this->object->findAll();

        $expected = [
            new TypePraticien(1, "MH", "Médecin Hospitalier", "Hopital ou Clinique"),
            new TypePraticien(2, "MV", "Médecine de Ville", "Cabinet"),
            new TypePraticien(3, "PH", "Pharmacien Hospitalier", "Hopital ou Clinique"),
            new TypePraticien(4, "PO", "Pharmacien Officine", "Pharmacie"),
            new TypePraticien(5, "PS", "Personnel de santé", "Centre Paramédical"),
        ];

        $this->assertEquals($expected, $result);
    }

    /**
     * @dataProvider findFromPraticienProvider
     */
     public function testFindFromPraticien($id, $row)
     {
         $results = $this->object->findFromPraticien($id);
 
         $reflectedClass = new ReflectionClass("gsb_prospects\model\objects\TypePraticien");
         $object = $reflectedClass->newInstanceArgs($row);
         $expected = $object;
 
         $this->assertEquals($expected, $results);
     }

     public function findProvider()
    {
        return [
            [ '1', "MH", "Médecin Hospitalier", "Hopital ou Clinique" ],
            [ '2', "MV", "Médecine de Ville", "Cabinet" ],
            [ '3', "PH", "Pharmacien Hospitalier", "Hopital ou Clinique" ],
            [ '4', "PO", "Pharmacien Officine", "Pharmacie" ],
            [ '5', "PS", "Personnel de santé", "Centre Paramédical" ],
        ];
    }

    public function findFromPraticienProvider()
    {
        return [
            [ '1', [ '1', "MH", "Médecin Hospitalier", "Hopital ou Clinique" ] ],
            [ '2', [ '2', "MV", "Médecine de Ville", "Cabinet" ] ],
            [ '3', [ '5', "PS", "Personnel de santé", "Centre Paramédical" ] ],
            [ '4', [ '3', "PH", "Pharmacien Hospitalier", "Hopital ou Clinique" ] ],
            [ '5', [ '4', "PO", "Pharmacien Officine", "Pharmacie" ] ],
        ];
    }
}