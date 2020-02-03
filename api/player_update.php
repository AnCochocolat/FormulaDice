<?php
require_once('common.php');

$leader_name=$_GET['leader_name'];

$name=$_GET['name'];

$last_meter=$_GET['last_meter'];

$attack_count=$_GET['attack_count'];

add_DB('update {$leader_name}_room set meter=:meter,attack_count=:attack_count where name=?',[$name]);

$param = [
    ':meter'=>$last_meter,
    ':attack_count'=>$attack_count
];

echo json_encode($param);