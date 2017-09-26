<?php
use PHPUnit\Framework\TestCase;
use gsb_prospects\model\dao\DAOException;
use gsb_prospects\model\dao\ClientDAO;
use gsb_prospects\model\objects\Client;

/**
 * @covers gsb_prospects\model\dao\ClientDAO
 */
final class ClientDAOTest extends TestCase
{
    protected $object;

    protected function setUp()
    {
        $this->object = new ClientDAO();
    }

    /**
     * @dataProvider findProvider
     */
    public function testFind($id_Praticien, $id, $nom, $prenom, $adresse, $id_Ville, $id_Type_Praticien)
    {
        $result = $this->object->find($id);

        $this->assertInstanceOf(Client::class, $result);

        $this->assertEquals($id_Praticien, $result->getIdPraticien());

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
        $expected_count = 27;
        $count = count($results);

        $this->assertEquals($expected_count, $count);

        $sliced_array = array_slice($results, 0, 5);
        
        $expected_array = [
            new Client('3', '3', 'Delahaye', 'André', '36 av 6 Juin', '3', '5'),
            new Client('4', '4', 'Leroux', 'André', '47 av Robert Schuman', '4', '3'),
            new Client('7', '7', 'Desgranges-Lentz', 'Antoine', '1 r Albert de Mun', '7', '2'),
            new Client('9', '9', 'Dupuy', 'Benoit', '9 r Demolombe', '9', '3'),
            new Client('10', '10', 'Lerat', 'Bernard', '31 r St Jean', '10', '4'),
        ];
        $this->assertEquals($expected_array, $sliced_array);
    }

    public function findProvider()
    {
        return [
            [ '3', '3', 'Delahaye', 'André', '36 av 6 Juin', '3', '5' ],
            [ '4', '4', 'Leroux', 'André', '47 av Robert Schuman', '4', '3' ],
            [ '7', '7', 'Desgranges-Lentz', 'Antoine', '1 r Albert de Mun', '7', '2' ],
            [ '9', '9', 'Dupuy', 'Benoit', '9 r Demolombe', '9', '3' ],
            [ '10', '10', 'Lerat', 'Bernard', '31 r St Jean', '10', '4' ],
        ];
    }
}