<?php
require_once('common.php');

//自身のid
$myid=$_GET['id'];

//走行距離取得
$c_mileage=$_GET['current_mileage'];

//残りの距離取得
$remain_distance=$_GET['distance'];

//イベント発生まで取得
$e_mileage=$_GET['event_mileage'];

//アタックモード回数取得
$attack_count=$_GET['attack_use_count'];

//アタックモードの回数
$attack_mode_count=$_GET['attack_mode_count'];

//ルーム名取得
$room=$_GET['room_name'];

//現在進行しているプレイヤー番号
$p_count=$_GET['player_count'];

//現在のプレイヤー番号を取得
$sql="update RoomList set player_number=$p_count where room_name='$room'";

//テーブル適応
add_DB($sql);

//ゴールしたかどうか取得
$goal=$_GET['is_goal'];

//ゴールしたかどうかでテーブルのゴール判定を変更
if($goal)
{
    //テーブルの値を更新するsqlを作成
    $update_sql="update $room set _c_mileage=$c_mileage,
    _distance=$remain_distance,
    _e_mileage=$e_mileage,
    _attack_use_mode=$attack_count,
    _attack_mode_count=$attack_mode_count,
    _is_goal=1 where _myid=$myid";
}
else
{
    //テーブルの値を更新するsqlを作成
    $update_sql="update $room set _c_mileage=$c_mileage,
    _distance=$remain_distance,
    _e_mileage=$e_mileage,
    _attack_use_mode=$attack_count,
    _attack_mode_count=$attack_mode_count where _myid=$myid";
}
//sql適応
add_DB($update_sql);