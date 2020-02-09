<?php
class EmployeeDeleteQuery {

private $id;

public function __construct($id) {
    $this->id = $id;
}

public function getQuery() {
    return "delete from employees where id = " . $this->id;
}

} // class
?>
