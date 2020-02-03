<?php
require_once('common.php');

$name=$_GET['name'];

add_DB('insert into UserData(name) values(?)',[$name]);

$data = get_DB('select max(id) as maxid from UserData');

$param = [
    'id' => $data['maxid']
];

echo json_encode($param);