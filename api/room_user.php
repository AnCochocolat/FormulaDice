<?php
require_once('common.php');

//リーダーid取得
$lid=$_GET['leader_id'];

//ルーム名
$room=$lid."_room";

//部屋人数取得
$count_sql="select count(*) as max_count from $room";

//sqlに適応
$result=get_DB($count_sql);

//部屋の人数を変数に保持
$player_count=$result['max_count'];

//sql作成
$sql="select name from $room";

//データ取得
$data=get_DB($sql);

//プレイヤーデータ
$player_data=array();

//人数分回す
for($i=0;$i<$player_count;$i++)
{
    $player_data[$i]=$data[$i][name];
}

switch($player_count){

    case 1:
    $param=[
        'player_count'=>1,
        'name0'=>$player_data[0]
    ];
    break;

    case 2:
    $param=[
        'player_count'=>2,
        'name0'=>$player_data[0],
        'name1'=>$player_data[1]
    ];
    break;

    case 3:
    $param=[
        'player_count'=>3,
        'name0'=>$player_data[0],
        'name1'=>$player_data[1],
        'name2'=>$player_data[2],
    ];
    break;

    case 4:
    $param=[
        'player_count'=>4,
        'name0'=>$player_data[0],
        'name1'=>$player_data[1],
        'name2'=>$player_data[2],
        'name3'=>$player_data[3],
    ];
    break;

}