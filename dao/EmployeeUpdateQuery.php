<?php
class EmployeeUpdateQuery {

private $id;
private $familyName;
private $givenName;
private $role;


public function __construct($id, $familyName, $givenName, $role) {
    $this->id = $id;
    $this->familyName = $familyName;
    $this->givenName = $givenName;
    $this->role = $role;
}

public function getQuery() {
    return "update employees"
            . " set family_name = \"" . $this->familyName . "\""
            . ", given_name = \"" . $this->givenName . "\""
            . ", role = " . $this->role
            . " where id = " . $this->id;
}

} // class
?>
