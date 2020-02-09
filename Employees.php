<?php
require_once("Db.php");
require_once("EmployeesQuery.php");

class Employees {

public function fetchAll() {
    $db = Db::getInstance();
    $rs = $db->runQuery((new EmployeesQuery())->getQuery());
    return $rs->fetchAll();
}

} // class
?>
