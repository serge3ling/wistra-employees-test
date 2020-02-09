<?php
require_once("dao/Db.php");
require_once("dao/EmployeesQuery.php");

class Employees {

public function fetchAll() {
    $db = Db::getInstance();
    $rs = $db->runQuery((new EmployeesQuery())->getQuery());
    return $rs->fetchAll();
}

} // class
?>
