<?php
class EmployeesQuery {

private $query;

public function __construct() {
    $this->query = "select id, family_name, given_name, role from employees"
            . " order by family_name, given_name";
}

public function getQuery() {
    return $this->query;
}

} // class
?>
