<?php
require_once('common.php');

//走行距離取得
$c_mileage=$_GET['current_mileage'];

//残りの距離取得
$remain_distance=$_GET['distance'];

//イベント発生まで取得
$e_mileage=$_GET['event_mileage'];

//アタックモード回数取得
$attack_count=$_GET['attack_mode_count'];



add_DB('update {$leader_name}_room set meter=:meter,attack_count=:attack_count where name=?',[$name]);

$param = [
    ':meter'=>$last_meter,
    ':attack_count'=>$attack_count
];

echo json_encode($param);