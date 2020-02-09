<?php
require_once('common.php');

//ルーム名取得
$room=$_GET['room_name'];

//部屋人数取得
$count_sql="select count(*) as max_count from $room";

//sqlに適応
$result=get_DB($count_sql);

//部屋の人数を変数に保持
$player_count=$result['max_count'];

//部屋がスタートされたかどうか
$start_sql="select is_start as start_check from RoomList where room_name='$room'";

//スタートナンバー取得
$result=get_DB($start_sql);

//スタートナンバーを変数に
$start_number=(int)$result['start_check'];

//スタートフラグ
$start_check=false;

//スタートナンバーが1だったらゲーム開始
if($start_number==1){
    $start_check=true;
}

//プレイヤーデータ
$player_data=array();

//人数分回す
for($i=0;$i<$player_count;$i++)
{
    //sql作成
    $sql="select name as player_name from $room where id=?";

    //データ取得
    $data=get_DB($sql,[$i+1]);

    $player_data[$i]=$data['player_name'];
}

switch($player_count){

    case 1:
    $param=[
        'player_count'=>1,
        'name0'=>$player_data[0],
        'is_start'=> $start_check
    ];
    break;

    case 2:
    $param=[
        'player_count'=>2,
        'name0'=>$player_data[0],
        'name1'=>$player_data[1],
        'is_start'=> $start_check
    ];
    break;

    case 3:
    $param=[
        'player_count'=>3,
        'name0'=>$player_data[0],
        'name1'=>$player_data[1],
        'name2'=>$player_data[2],
        'is_start'=> $start_check
    ];

    break;

    case 4:
    $param=[
        'player_count'=>4,
        'name0'=>$player_data[0],
        'name1'=>$player_data[1],
        'name2'=>$player_data[2],
        'name3'=>$player_data[3],
        'is_start'=> $start_check
    ];
    break;

}

//jsonでデータを返す
echo json_encode($param);