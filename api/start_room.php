<?php
require_once('common.php');
    //ルーム名
    $room=$_GET['room_name'];

    //is_joinを0にするsqlを作成
    $sql="update RoomList set is_join=0 where room_name='$room'";

    //is_startを1にするsql作成
    $start_sql="update RoomList set is_start=1 where room_name='$room'";

    //sqlに適応
    add_DB($sql);

    //sql適応
    add_DB($start_sql);