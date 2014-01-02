<?php
include_once 'class.MySQL.php';
class Peliculas extends MySQL{
    var $table = "peliculas";
    function __construct($database, $username, $password, $hostname = 'localhost') {
        parent::__construct($database, $username, $password, $hostname);
    }
    function verTodos(){
        return parent::Select($this->table);
    }
}
