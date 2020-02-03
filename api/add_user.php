<?php
require_once('common.php');

$name=$_GET['name'];

add_DB('insert into UserData(name) values(?)',[$name]);

$data = get_DB('select max(id) as maxid from UserData');

$myid=$data['maxid'];

$result=get_DB('select room_name as room_Name from RoomList where is_join=1 limit 1');

$result_room=$result['room_Name'];

$leader=false;

$room = $myid."_room";

if($result)
{
    $sql="insert into $result_room(name) values(?)";
    add_DB($sql,[$name]);
}
else
{
    $sql="create table $room(id int AUTO_INCREMENT, name varchar(64),PRIMARY KEY(id))";

    add_DB($sql);

    $sql="insert into RoomList(room_name,is_join) values(?,1)";

    add_DB($sql,[$room]);

    $sql="insert into $room(name) values(?)";

    add_DB($sql,[$name]);


    $leader=true;
}

$param = [
    'id' => $myid,
    'is_leader' => $leader
];


echo json_encode($param);