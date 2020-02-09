<?php
require_once("dao/Db.php");
require_once("dao/EmployeeInsertQuery.php");

if (isset($_POST["family_name"]) === true) {
    $db = Db::getInstance();
    $rs = $db->runQuery((new EmployeeInsertQuery(
                $_POST["family_name"],
                $_POST["given_name"],
                $_POST["role"]
            ))->getQuery());
}
?>
