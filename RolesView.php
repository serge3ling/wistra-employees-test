<?php
require_once("Roles.php");

class RolesView {

public function getView() {
    $roleMap = (new Roles())->getRoleMap();
    $s = "";
    
    foreach ($roleMap as $key => $val) {
        $s .= "<option data-role=\"" . $key . "\">" . $val . "</option>\n";
    }
    unset($val);
    
    return $s;
}

} // class
?>
