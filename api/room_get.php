<?php
require_once('common.php');

//ルーム名取得
$room=$_GET['room_name'];

//現在のプレイヤー取得
$player_=$_GET['player_count'];

//部屋人数をカウント
$count_sql="select count(*) as max_count from $room";

//sqlから部屋人数取得
$result=get_DB($count_sql);

//部屋人数を変数に保持
$count=$result['max_count'];

//現在のプレイヤー番号をテーブルに適応するsql作成
$player_count_sql="update $room set _player_count=$player_";

//返す値
$param=[
    'count'=>$count,
    'player_count'=>$player_
];