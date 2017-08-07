<?php
use PHPUnit\Framework\TestCase;
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

    public function findProvider()
    {
        return [
            [1, "MH", "Médecin Hospitalier", "Hopital ou Clinique"],
            [2, "MV", "Médecine de Ville", "Cabinet"],
            [3, "PH", "Pharmacien Hospitalier", "Hopital ou Clinique"],
            [4, "PO", "Pharmacien Officine", "Pharmacie"],
            [5, "PS", "Personnel de santé", "Centre Paramédical"],
        ];
    }

}