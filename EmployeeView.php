<?php
class EmployeeView {

private $assocArr;
private $roleMap;

public function __construct($assocArr, $roleMap) {
    $this->assocArr = $assocArr;
    $this->roleMap = $roleMap;
}

public function getView() {
    $role = $this->assocArr["role"];
    return "<tr data-id=\"" . $this->assocArr["id"] . "\">"
            . "<td><input class=\"emp-radio\" type=\"radio\""
                . " name=\"emp-radio\" onclick=\"selectRowByRadio(this);\"/></td>"
            . "<td class=\"family-td\">" . $this->assocArr["family_name"] . "</td>"
            . "<td class=\"given-td\">" . $this->assocArr["given_name"] . "</td>"
            . "<td class=\"role-td\" data-role=\"" . $role . "\">"
                . $this->roleMap[$role]
            . "</td>"
            . "</tr>";
}

} // class
?>
