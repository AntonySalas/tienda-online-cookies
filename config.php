<?php

include_once 'class/class.MySQL.php';
$objTienda = new MySQL("importado", "root", "1234");

$tPeliculas["CodPelicula"] = array(
    "id" =>1,
    "txt" => 'CodPelicula',
    "edit" => "editable:true, edittype:'text', editoptions:{...}",
    "editRules" => "editrules:{...}, formoptions:{...}");
$tPeliculas["Titulo"] = array(
    "id" =>1,
    "txt" => 'Titulo',
    "edit" => "editable:true, edittype:'text', editoptions:{...}",
    "editRules" => "editrules:{...}, formoptions:{...}");
$tPeliculas["Duracion"] = array(
    "id" =>1,
    "txt" => 'Duracion',
    "edit" => "editable:true, edittype:'text', editoptions:{...}",
    "editRules" => "editrules:{...}, formoptions:{...}");
$tPeliculas["CodGenero"] = array(
    "id" =>1,
    "txt" => 'CodGenero',
    "edit" => "editable:true, edittype:'text', editoptions:{...}",
    "editRules" => "editrules:{...}, formoptions:{...}");
$tPeliculas["Año"] = array(
    "id" =>1,
    "txt" => 'Año',
    "edit" => "editable:true, edittype:'text', editoptions:{...}",
    "editRules" => "editrules:{...}, formoptions:{...}");
$tPeliculas["Productora"] = array(
    "id" =>1,
    "txt" => 'Productora',
    "edit" => "editable:true, edittype:'text', editoptions:{...}",
    "editRules" => "editrules:{...}, formoptions:{...}");
$tPeliculas["Pais"] = array(
    "id" =>1,
    "txt" => 'Pais',
    "edit" => "editable:true, edittype:'text', editoptions:{...}",
    "editRules" => "editrules:{...}, formoptions:{...}");
$tPeliculas["Precio"] = array(
    "id" =>1,
    "txt" => 'Precio',
    "edit" => "editable:true, edittype:'text', editoptions:{...}",
    "editRules" => "editrules:{...}, formoptions:{...}");
$tPeliculas["Director"] = array(
    "id" =>1,
    "txt" => 'Director',
    "edit" => "editable:true, edittype:'text', editoptions:{...}",
    "editRules" => "editrules:{...}, formoptions:{...}");