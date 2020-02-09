<?php
class RolesQuery {

private $query;

public function __construct() {
    $this->query = "select id from employee_roles";
}

public function getQuery() {
    return $this->query;
}

} // class
?>
