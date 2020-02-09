<?php
require_once("Db.php");
require_once("EmployeeDeleteQuery.php");

if (isset($_POST["id"]) === true) {
    $db = Db::getInstance();
    $rs = $db->runQuery((new EmployeeDeleteQuery($_POST["id"]))->getQuery());
}
?>
