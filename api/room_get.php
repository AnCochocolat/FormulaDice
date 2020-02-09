<?php
require_once('common.php');

//リーダーのid
$lid=$_GET['leader_id'];

//ルー厶名変数
$room=$lid."_room";

//部屋人数をカウント
$count_sql="select count(*) as max_count from $room";

//sqlから部屋人数取得
$result=get_DB($count_sql);

//部屋人数を変数に保持
$player_count=$result['max_count'];

//返す値
$param=[
    'player_count'=>$player_count
];