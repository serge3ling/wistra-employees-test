<?php
class EmployeeQuery {

private $query;

public function __construct($id) {
    $this->query = "select id, family_name, given_name, role"
            . " from employees where id = " . $id;
}

public function getQuery() {
    return $this->query;
}

} // class
?>
