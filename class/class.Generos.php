<?php
include_once 'class.MySQL.php';
class Generos extends MySQL{
    var $table = "generos";
    function __construct($database, $username, $password, $hostname = 'localhost') {
        parent::__construct($database, $username, $password, $hostname);
    }
    function verTodos(){
        return parent::Select($this->table);
    }
}