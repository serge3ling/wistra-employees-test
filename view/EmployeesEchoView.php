<?php
require_once("dao/Roles.php");
require_once("dao/Employees.php");
require_once("view/EmployeeView.php");

class EmployeesEchoView {

private $roleMap;

private function pullRoleMap() {
    $this->roleMap = (new Roles())->getRoleMap();
}

public function makeEcho() {
    $this->pullRoleMap();
    
    $employeesFetched = (new Employees())->fetchAll();
    
    foreach ($employeesFetched as $row) {
        echo (new EmployeeView($row, $this->roleMap))->getView();
    }
    unset($view);
    unset($row);
}

} // class
?>
