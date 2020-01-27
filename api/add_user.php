<?php
require_once('common.php');

$name=$_GET['name'];

add_DB('insert into UserData(name) values(?)',[$name]);

$param = [
    'name' => $name
];

echo json_encode($param);