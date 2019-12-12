<?php


namespace ECommerce\Tables;

use ECommerce\Site;

class Validators extends Table {

    public function __construct(Site $site) {
        parent::__construct($site, "validator");
    }

    public function newValidator($userid) {
        $validator = $this->createValidator();

        $sql =<<<SQL
INSERT INTO $this->tableName (validator, userid, date)
VALUES (?, ?, ?)
SQL;
        $statement = $this->pdo()->prepare($sql);
        $statement->execute(array($validator, $userid, date("Y-m-d H:i:s")));
        if($statement->rowCount() === 0) {
            return null;
        }

        return $validator;
    }

    public function createValidator($len = 32) {
        $bytes = openssl_random_pseudo_bytes($len / 2);
        return bin2hex($bytes);
    }

    public function get($validator) {
        $sql =<<<SQL
SELECT userid FROM $this->tableName
WHERE validator=?
SQL;
        $statement = $this->pdo()->prepare($sql);
        $statement->execute(array($validator));
        if($statement->rowCount() === 0) {
            return false;
        }

        return $statement->fetch(\PDO::FETCH_ASSOC);
    }

    public function remove($userid) {
        $sql =<<<SQL
DELETE FROM $this->tableName
WHERE userid=?
SQL;
        $statement = $this->pdo()->prepare($sql);
        $statement->execute(array($userid));

    }
}