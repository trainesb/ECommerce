<?php


namespace ECommerce\Tables;


use ECommerce\Site;

class TopSubMaps extends Table {

    public function __construct(Site $site) {
        parent::__construct($site, "top_sub_map");
    }

    public function add($topId, $subId) {
        $sql = "INSERT INTO $this->tableName (top_id, sub_id) VALUES (?, ?)";

        $statement = $this->pdo()->prepare($sql);
        $statement->execute(array($topId, $subId));
        if($statement->rowCount() === 0) {
            return false;
        }
        return true;
    }

    public function getSubFor($top_id) {
        $sql = "SELECT * FROM $this->tableName WHERE top_id = ?";

        $statement = $this->pdo()->prepare($sql);
        $statement->execute(array($top_id));
        if($statement->rowCount() === 0) {
            return null;
        }
        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

}