<?php
require_once("Db.php");
require_once("RolesQuery.php");

class Roles {

private $namesTranslated = array(
    -1 => "(?)",
    1 => "Розробник",
    2 => "Менеджер",
    3 => "Тестер",
);

public function getRoleMap() {
    $db = Db::getInstance();
    $rs = $db->runQuery((new RolesQuery())->getQuery());
    $fetched = $rs->fetchAll();
    
    $roles = array();
    
    foreach ($fetched as $val) {
        $id = $val["id"];
        $roles[$id] = $this->namesTranslated[$id];
    }
    unset($val);
    
    return $roles;
}

} // class
?>
