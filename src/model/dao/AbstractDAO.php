<?php
namespace gsb_prospects\model\dao;

abstract class AbstractDAO {
    const DRIVER = "mysql:";
    const HOST = "host=localhost;";
    const DBNAME = "dbname=gsb;";
    const USER = "gsb";
    const PASSWORD = "gsb!2017";
    const DSN = self::DRIVER . self::HOST . self::DBNAME;

    private $connexion;

    public function __construct() {
    }

    public function getConnexion() {
        try {
            $connexion = new \PDO(self::DSN, self::USER, self::PASSWORD);
        } catch (\PDOException $e) {
            print("<p>PDOException {$e->getCode()}</p>" . PHP_EOL);
            print("<p>{$e->getMessage()}</p>" . PHP_EOL);
            die();
        }
        return $connexion;
    }

    public function closeConnexion() {
        $connexion = null;
    }
}
?>