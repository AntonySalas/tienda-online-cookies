<?php
include_once 'class.MySQL.php';
class Tienda extends MySQL{
    public function __construct($database, $username, $password, $hostname = 'localhost') {
        parent::__construct($database, $username, $password, $hostname);
    }
    public function verLista($tabla) {
        return parent::Select($tabla);
    }
    public function selectItems($tabla) {
        return parent::Select($tabla, $where);
    }
}