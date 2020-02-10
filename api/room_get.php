<?php
require_once('common.php');

//カウント
$num_count=$_GET['num_count'];

//ルーム名取得
$room=$_GET['room_name'];

//現在のプレイヤー番号を取得
$sql="select player_number from RoomList where room_name='$room'";

//プレイヤー番号
$player_number=get_DB($sql);

//プレイヤーデータ
$player_data=array(array());

    //テーブルから値を取得する
    $sql="select _c_mileage as is_mileage from $room where id=?";

    //sqlから取得
    $result_sql=get_DB($sql,[$num_count+1]);

    //テーブルから取得してきた値
    $result_c_mileage=(int)$result_sql['is_mileage'];

    $sql="select _distance as is_distance from $room where id=?";

    //sqlから取得
    $result_sql=get_DB($sql,[$num_count+1]);

    $result_distance=(int)$result_sql['is_distance'];

    $sql="select _e_mileage as is_emileage from $room where id=?";

    //sqlから取得
    $result_sql=get_DB($sql,[$num_count+1]);

    $result_e_mileage=(int)$result_sql['is_emileage'];

    $sql="select _attack_use_mode as is_attack_usecount from $room where id=?";

    //sqlから取得
    $result_sql=get_DB($sql,[$num_count+1]);

    $result_attackuse_count=(int)$result_sql['is_attack_usecount'];

    $sql="select _attack_mode_count as is_attackcount from $room where id=?";

    //sqlから取得
    $result_sql=get_DB($sql,[$num_count+1]);
    
    $result_attackmode_count=(int)$result_sql['is_attackcount'];

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