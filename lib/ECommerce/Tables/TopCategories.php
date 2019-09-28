<?php


namespace ECommerce\Tables;



use ECommerce\Site;

class TopCategories extends Table {

    public function __construct(Site $site) {
        parent::__construct($site, "top_cat");
    }

    public function add($name, $description, $visible) {
        $sql = "INSERT INTO $this->tableName (name, description, visible) VALUES (?, ?, ?)";

        $statement = $this->pdo()->prepare($sql);
        $statement->execute(array($name, $description, $visible));
        if($statement->rowCount() === 0) {
            return false;
        }
        return true;
    }

    public function getById($id) {
        $sql = "SELECT * FROM $this->tableName";
        $statement = $this->pdo()->prepare($sql);
        $statement->execute(array($id));
        if($statement->rowCount() === 0) {
            return flase;
        }

        return $statement->fetch(\PDO::FETCH_ASSOC);
    }
}