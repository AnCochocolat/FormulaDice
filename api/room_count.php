<?php
require_once('common.php');

//ルーム名取得
$room=$_GET['room_name'];

//部屋人数をカウント
$count_sql="select count(*) as max_count from $room";

//sqlから部屋人数取得
$result=get_DB($count_sql);

//部屋人数を変数に保持
$count=$result['max_count'];

//現在のプレイヤー番号を取得
$sql="select player_number from RoomList where room_name='$room'";

//プレイヤー番号
$player_number=get_DB($sql);

$param=[
    'count'=>$count,
    'player_count'=>$player_number
];

echo json_encode($param); 