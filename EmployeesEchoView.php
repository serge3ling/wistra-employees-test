<?php
require_once("Roles.php");
require_once("Employees.php");
require_once("EmployeeView.php");

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
