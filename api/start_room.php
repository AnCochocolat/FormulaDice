<?php
require_once('common.php');
    //ルーム名
    $room=$_GET['room_name'];

    //is_joinを0にするsqlを作成
    $sql="update RoomList set is_join=0 where room_name=$room";

    //sqlに適応
    add_DB($sql);