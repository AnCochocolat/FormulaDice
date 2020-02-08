<?php
require_once('common.php');

//リーダーのid
$lid=$_GET['leader_id'];

//自身のid
$myid=$_GET['id'];

//走行距離取得
$c_mileage=$_GET['current_mileage'];

//残りの距離取得
$remain_distance=$_GET['distance'];

//イベント発生まで取得
$e_mileage=$_GET['event_mileage'];

//アタックモード回数取得
$attack_count=$_GET['attack_mode_count'];

//ルー厶名変数
$room=$lid."_room";

//テーブルの値を更新するsqlを作成
$update_sql="update $room set _c_mileage=$c_mileage,
            _distance=$remain_distance,
            _e_mileage=$e_mileage,
            _attack_count=$attack_count where _myid=$myid";

//sql適応
add_DB($update_sql);

//テーブルから値を取得する
$sql="select _c_mileage as is_mileage,
    _distance as is_distance,
    _e_mileage as is_emileage,
    _attack_count as is_attackcount from $room where _myid=$myid";

//sqlから取得
$result_sql=get_DB($sql);

//テーブルから取得してきた値
$result_c_mileage=$result_sql['is_mileage'];
$result_distance=$result_sql['is_distance'];
$result_e_mileage=$result_sql['is_emileage'];
$result_attack_count=$result_sql['is_attackcount'];

//パラメータを返す
$param=[
    'mileage'=>$result_c_mileage,
    'distance'=>$result_distance,
    'e_mileage'=>$result_e_mileage,
    'attack_count'=>$result_attack_count
];

echo json_encode($param);