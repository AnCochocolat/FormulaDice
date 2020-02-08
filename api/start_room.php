<?php
require_once('common.php');

//リーダーフラグ取得
$leader_check=$_GET['leader'];

//リーダーだったら
if($leader_check){
    
    //id取得
    $id=$_GET['id'];

    //ルーム名
    $room=$id."_room";

    //is_joinを0にするsqlを作成
    $sql="update RoomList set is_join=0 where room_name=$room";

    //sqlに適応
    add_DB($sql);
}