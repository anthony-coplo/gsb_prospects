<?php
namespace gsb_prospects\model\dao;

use \PDOException;
use \PDO;

abstract class AbstractDAO {
    const DRIVER = "mysql";
    const HOST = "host=localhost;";
    const DBNAME = "dbname=gsb_prospects;";
    const CHARSET = "charset=UTF8;";

    const DSN = self::DRIVER . ":" . self::HOST . self::DBNAME . self::CHARSET;

    const USER = "gsb";
    const PASSWORD = "gsb!2017";

    protected $table;
    private $connexion;

    protected function getConnexion() {
        try {
            $connexion = new PDO(self::DSN, self::USER, self::PASSWORD);
        } catch (PDOException $e) {
            print("<p>PDOException {$e->getCode()}</p>" . PHP_EOL);
            print("<p>{$e->getMessage()}</p>" . PHP_EOL);
            die();
        }
        return $connexion;
    }

    protected function closeConnexion() {
        $connexion = null;
    }
}
?>