<?php
class Db {
private static $instance = null;

private $dbh;
private $msg;
private $connected;
private $pw;

private function __construct() {
    $this->pw = "w1str4P";
    try {
        $this->dbh = new PDO("mysql:host=localhost;dbname=wistra;charset=utf8", "wistra", $this->pw);
        $this->connected = true;
        $this->msg = "Connected.";
    } catch (PDOException $epdo) {
        $this->connected = false;
        $this->msg = "Could not connect. " . $epdo->getMessage();
    }
}

public static function getInstance() {
    if (self::$instance === null) {
        self::$instance = new self();
    }
    return self::$instance;
}

public function isConnected() {
    return $this->connected;
}

public function toString() {
    return $this->msg;
}

public function runQuery($query) {
    return $this->dbh->query($query);
}

public function getHandler() {
    return $this->dbh;
}

public function comparePw($password) {
    $oc = false;
    if ($password == $this->pw) {
        $oc = true;
    }
    return $oc;
}

} // class
?>
