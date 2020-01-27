<?php
require_once('common.php');

$name=$_GET['name'];

add_DB('insert into UserData(name) values(?)',[$name]);

$id = get_DB('select id from UserData where max(id)');

$param = [
    'id' => $id
];

echo json_encode($param);