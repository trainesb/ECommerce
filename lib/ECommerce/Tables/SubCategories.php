<?php


namespace ECommerce\Tables;

use ECommerce\Site;

class SubCategories extends Table {

    public function __construct(Site $site) {
        parent::__construct($site, "sub_cat");
    }

    public function add($name, $description, $visible, $img) {
        $sql = <<<SQL
INSERT INTO $this->tableName (name, description, visible, img)
VALUES (?, ?, ?, ?)
SQL;
        $statement = $this->pdo()->prepare($sql);
        $statement->execute(array($name, $description, $visible, $img));
        if($statement->rowCount() === 0) {
            return false;
        }
        return true;
    }

    public function getById($id) {
        $sql = "SELECT * FROM $this->tableName WHERE id=?";
        $statement = $this->pdo()->prepare($sql);
        $statement->execute(array($id));
        if($statement->rowCount() === 0) {
            return null;
        }

        return $statement->fetch(\PDO::FETCH_ASSOC);
    }
}