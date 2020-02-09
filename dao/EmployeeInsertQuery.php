<?php
class EmployeeInsertQuery {

private $familyName;
private $givenName;
private $role;


public function __construct($familyName, $givenName, $role) {
    $this->familyName = $familyName;
    $this->givenName = $givenName;
    $this->role = $role;
}

public function getQuery() {
    return "insert into employees (family_name, given_name, role) values ("
            . "\"" . $this->familyName . "\", "
            . "\"" . $this->givenName . "\", "
            . $this->role
            . ")";
}

} // class
?>
