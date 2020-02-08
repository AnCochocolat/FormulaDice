<?php
require_once('common.php');

//リーダーid取得
$lid=$_GET['leader_id'];

//ルー厶名
$room=$lid."_room";

//部屋テーブルを削除するsql
$sql="drop table $room";

//sql適応
add_DB($sql);

//部屋リストから部屋データを削除するsql
$sql="delete from RoomList where room_name=$room";

//sql適応
add_DB($sql);