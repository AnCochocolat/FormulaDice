<?php
require_once('common.php');

$leader_name=$_GET['leader_name'];

$name=$_GET['name'];

$last_meter=$_GET['last_meter'];

$attack_count=$_GET['attack_count'];

$leader_id=$_GET['leader_id'];

$room=$leader_id."_room";

$sql="update  set meter=:meter,attack_count=:attack_count where name=?"

add_DB($sql,[$name]);

/* $param = [
    ':meter'=>$last_meter,
    ':attack_count'=>$attack_count
];

echo json_encode($param); */