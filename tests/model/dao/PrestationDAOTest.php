<?php
use PHPUnit\Framework\TestCase;
use gsb_prospects\model\dao\DAOException;
use gsb_prospects\model\dao\PrestationDAO;
use gsb_prospects\model\objects\Prestation;

/**
 * @covers gsb_prospects\model\dao\PrestationDAO
 */
final class PrestationDAOTest extends TestCase
{
    protected $object;

    protected function setUp()
    {
        $this->object = new PrestationDAO();
    }

    /**
     * @dataProvider findProvider
     */
    public function testFind($id, $nom)
    {
        $result = $this->object->find($id);

        $this->assertInstanceOf(Prestation::class, $result);

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
        
        $expected_count = 3;
        $this->assertEquals($expected_count, $count);

        $expected_array = [
            new Prestation('1', 'visite'),
            new Prestation('2', 'conférence'),
            new Prestation('3', 'formation'),
        ];
        $this->assertEquals($expected_array, $results);
    }

    /**
     * @dataProvider findAllFromClientProvider
     */
    public function testFindAllFromClient($id_Client, $array)
    {
        $results = $this->object->findAllFromClient($id_Client);

        $expected = [];
        foreach($array as $row) {
            $reflectedClass = new ReflectionClass("gsb_prospects\model\objects\Prestation");
            $object = $reflectedClass->newInstanceArgs($row);
            $expected[] = $object;
        }

        $this->assertEquals($expected, $results);
    }

     public function findProvider()
    {
        return [
            [ '1', 'visite' ],
            [ '2', 'conférence' ],
            [ '3', 'formation' ],
        ];
    }

    public function findAllFromClientProvider()
    {
        return [
            [ '3',  [                                           [ '3', 'formation' ] ] ],
            [ '4',  [ [ '1', 'visite' ], [ '2', 'conférence' ],                      ] ],
            [ '7',  [                    [ '2', 'conférence' ], [ '3', 'formation' ] ] ],
            [ '9',  [ [ '1', 'visite' ], [ '2', 'conférence' ], [ '3', 'formation' ] ] ],
            [ '10', [ [ '1', 'visite' ],                                             ] ],
        ];
    }
}