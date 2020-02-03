<?php
require_once('common.php');

//リーダーの名前
$leader_name=$_GET['leader_name'];

//自身の名前
$name=$_GET['name'];

//ゴールまでの距離
$last_meter=$_GET['last_meter'];

//アタックカウント
$attack_count=$_GET['attack_count'];

//リーダーかどうか
$leader=$_GET['is_leader'];

//リーダーだったら
if($leader){

}

add_DB('update {$leader_name}_room set meter=:meter,attack_count=:attack_count where name=?',[$name]);

$param = [
    ':meter'=>$last_meter,
    ':attack_count'=>$attack_count
];

echo json_encode($param);