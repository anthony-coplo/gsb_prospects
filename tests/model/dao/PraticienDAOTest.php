<?php
use PHPUnit\Framework\TestCase;
use gsb_prospects\model\dao\DAOException;
use gsb_prospects\model\dao\PraticienDAO;
use gsb_prospects\model\objects\Praticien;

/**
 * @covers gsb_prospects\model\dao\TypePraticienDAO
 */
final class PraticienDAOTest extends TestCase
{
    protected $object;

    protected function setUp()
    {
        $this->object = new PraticienDAO();
    }

    /**
     * @dataProvider findProvider
     */
    public function testFind($id, $nom, $prenom, $adresse, $id_Ville, $id_Type_Praticien)
    {
        $result = $this->object->find($id);

        $this->assertInstanceOf(Praticien::class, $result);

        $this->assertEquals($id, $result->getId());
        $this->assertEquals($nom, $result->getNom());
        $this->assertEquals($prenom, $result->getPrenom());
        $this->assertEquals($adresse, $result->getAdresse());
        $this->assertEquals($id_Ville, $result->getIdVille());
        $this->assertEquals($id_Type_Praticien, $result->getIdTypePraticien());
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
        $expected_count = 86;
        $count = count($results);

        $this->assertEquals($expected_count, $count);

        $sliced_array = array_slice($results, 0, 5);
        
        $expected_array = [
            new Praticien('1', 'Notini', 'Alain', '114 r Authie', '1', '1'),
            new Praticien('2', 'Gosselin', 'Albert', '13 r Devon', '2', '2'),
            new Praticien('3', 'Delahaye', 'André', '36 av 6 Juin', '3', '5'),
            new Praticien('4', 'Leroux', 'André', '47 av Robert Schuman', '4', '3'),
            new Praticien('5', 'Desmoulins', 'Anne', '31 r St Jean', '5', '4'),
        ];
        $this->assertEquals($expected_array, $sliced_array);
    }

    public function findProvider()
    {
        return [
            [ 1, 'Notini', 'Alain', '114 r Authie', '1', '1' ],
            [ 2, 'Gosselin', 'Albert', '13 r Devon', '2', '2' ],
            [ 3, 'Delahaye', 'André', '36 av 6 Juin', '3', '5' ],
            [ 4, 'Leroux', 'André', '47 av Robert Schuman', '4', '3' ],
            [ 5, 'Desmoulins', 'Anne', '31 r St Jean', '5', '4' ],
        ];
    }
}