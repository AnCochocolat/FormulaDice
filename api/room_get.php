<?php
require_once('common.php');

//カウント
$num_count=$_GET['num_count'];

//ルーム名取得
$room=$_GET['room_name'];

//現在のプレイヤー番号を取得
$sql="select player_number from RoomList where room_name=$room";

//プレイヤー番号
$player_number=get_DB($sql);

//プレイヤーデータ
$player_data=array(array());

    //テーブルから値を取得する
    $sql="select _c_mileage as is_mileage,
    _distance as is_distance,
    _e_mileage as is_emileage,
    _attack_use_mode as is_attack_usecount,
    _attack_mode_count as is_attackcount from $room where id=?";

    //sqlから取得
    $result_sql=get_DB($sql,[$num_count+1]);

    //テーブルから取得してきた値
    $result_c_mileage=$result_sql['is_mileage'];
    $result_distance=$result_sql['is_distance'];
    $result_e_mileage=$result_sql['is_emileage'];
    $result_attackuse_count=$result_sql['is_attack_usecount'];
    $result_attackmode_count=$result_sql['is_attackcount'];

//パラメータを返す
$param=[
    'mileage'=>$result_c_mileage,
    'distance'=>$result_distance,
    'e_mileage'=>$result_e_mileage,
    'attack_use_count'=>$result_attackuse_count,
    'attack_mode_count'=>$result_attackmode_count,
    'player_count'=>$player_number
]; 

echo json_encode($param); 