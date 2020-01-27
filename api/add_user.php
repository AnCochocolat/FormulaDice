<?php
require_once('common.php');

$name=isset($_GET['name']);

$data = operate_DB('insert into UserData(name) values(?)',[$name]);

$test=operate_DB('select name from UserData where name=?',[$name]);

$param = [
    'name' => ($test['name'] == $name)
];

echo json_encode($param);

