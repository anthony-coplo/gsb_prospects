<?php
use PHPUnit\Framework\TestCase;
use gsb_prospects\model\dao\DAOException;
use gsb_prospects\model\dao\EtatDAO;
use gsb_prospects\model\objects\Etat;

/**
 * @covers gsb_prospects\model\dao\EtatDAO
 */
final class EtatDAOTest extends TestCase
{
    protected $object;

    protected function setUp()
    {
        $this->object = new EtatDAO();
    }

    /**
     * @dataProvider findProvider
     */
    public function testFind($id, $nom)
    {
        $result = $this->object->find($id);

        $this->assertInstanceOf(Etat::class, $result);

        $this->assertEquals($id, $result->getId());
        $this->assertEquals($nom, $result->getNom());
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
        
        $expected_count = 5;
        $this->assertEquals($expected_count, $count);

        $expected_array = [
            new Etat('1', 'nouveau'),
            new Etat('2', 'à rappeler'),
            new Etat('3', 'rendez-vous en attente'),
            new Etat('4', 'rendez-vous à confirmer'),
            new Etat('5', 'rendez-vous confirmé'),
        ];
        $this->assertEquals($expected_array, $results);
    }

    /**
     * @dataProvider findFromProspectProvider
     */
    public function testFindFromProspect($id_Praticien, $row)
    {
        $results = $this->object->findFromProspect($id_Praticien);

        $reflectedClass = new ReflectionClass("gsb_prospects\model\objects\Etat");
        $object = $reflectedClass->newInstanceArgs($row);
        $expected = $object;

        $this->assertEquals($expected, $results);
    }

     public function findProvider()
    {
        return [
            [ '1', 'nouveau' ],
            [ '2', 'à rappeler' ],
            [ '3', 'rendez-vous en attente' ],
            [ '4', 'rendez-vous à confirmer' ],
            [ '5', 'rendez-vous confirmé' ],
        ];
    }

    public function findFromProspectProvider()
    {
        return [
            [ '63', [ '1', 'nouveau' ] ],
            [ '70', [ '1', 'nouveau' ] ],
            [ '76', [ '1', 'nouveau' ] ],
            [ '59', [ '2', 'à rappeler' ] ],
            [ '54', [ '3', 'rendez-vous en attente' ] ],
        ];
    }
}