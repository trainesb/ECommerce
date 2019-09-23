<?php


namespace ECommerce;


class TopCategories extends Table {

    public function __construct(Site $site) {
        parent::__construct($site, "top_cat");
    }

    public function add($name, $description, $visible) {
        $sql = <<<SQL
INSERT INTO $this->tableName (name, description, visible)
VALUES (?, ?, ?)
SQL;
        $statement = $this->pdo()->prepare($sql);
        $statement->execute(array($name, $description, $visible));
        if($statement->rowCount() === 0) {
            return false;
        }
        return true;
    }

    public function getAll() {
        $sql = <<<SQL
SELECT * FROM $this->tableName
SQL;
        $statement = $this->pdo()->prepare($sql);
        $statement->execute();
        if($statement->rowCount() === 0) {
            return null;
        }
        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }
}