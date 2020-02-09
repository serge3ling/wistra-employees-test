<?php
require_once("dao/Db.php");
require_once("dao/EmployeeUpdateQuery.php");

if (isset($_POST["id"]) === true) {
    $db = Db::getInstance();
    $rs = $db->runQuery((new EmployeeUpdateQuery(
                $_POST["id"],
                $_POST["family_name"],
                $_POST["given_name"],
                $_POST["role"]
            ))->getQuery());
}
?>
