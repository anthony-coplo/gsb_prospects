<?php
use PHPUnit\Framework\TestCase;
use gsb_prospects\model\dao\DAOException;
use gsb_prospects\model\dao\ProspectDAO;
use gsb_prospects\model\objects\Prospect;

/**
 * @covers gsb_prospects\model\dao\ProspectDAO
 */
final class ProspectDAOTest extends TestCase
{
    protected $object;

    protected function setUp()
    {
        $this->object = new ProspectDAO();
    }

    /**
     * @dataProvider findProvider
     */
    public function testFind($id_Praticien, $id_Etat, $id, $nom, $prenom, $adresse, $id_Ville, $id_Type_Praticien)
    {
        $result = $this->object->find($id);

        $this->assertInstanceOf(Prospect::class, $result);

        $this->assertEquals($id_Praticien, $result->getIdPraticien());
        $this->assertEquals($id_Etat, $result->getIdEtat());
        
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
        $expected_count = 25;
        $count = count($results);

        $this->assertEquals($expected_count, $count);

        $sliced_array = array_slice($results, 0, 5);
        
        $expected_array = [
            new Prospect('63', '1', '63', 'Boireaux', 'Philippe', '14 av Thiès', '57', '5'),
            new Prospect('64', '1', '64', 'Cendrier', 'Philippe', '7 pl St Gilles', '58', '3'),
            new Prospect('65', '1', '65', 'Duhamel', 'Philippe', '114 r Authie', '9', '4'),
            new Prospect('66', '1', '66', 'Grigy', 'Philippe', '15 r Mélingue', '59', '1'),
            new Prospect('67', '1', '67', 'Linard', 'Philippe', '1 r Albert de Mun', '60', '2'),
        ];
        $this->assertEquals($expected_array, $sliced_array);
    }

    public function findProvider()
    {
        return [
            [ '52', '3', 52, 'Dauverne', 'Marie-Christine', '69 av Charlemagne', '47', '2' ],
            [ '53', '2', 53, 'Vittorio', 'Myriam', '3 pl Champlain', '48', '5' ],
            [ '54', '3', 54, 'Lapasset', 'Nhieu', '31 av 6 Juin', '49', '3' ],
            [ '55', '2', 55, 'Plantet-Besnier', 'Nicole', '10 av 1ère Armée Française', '50', '4' ],
            [ '56', '2', 56, 'Chubilleau', 'Pascal', '3 r Hastings', '51', '1' ],
        ];
    }
}