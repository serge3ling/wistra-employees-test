<?php
require_once("dao/Db.php");
require_once("dao/EmployeeDeleteQuery.php");

if (isset($_POST["id"]) === true) {
    $db = Db::getInstance();
    $rs = $db->runQuery((new EmployeeDeleteQuery($_POST["id"]))->getQuery());
}
?>
