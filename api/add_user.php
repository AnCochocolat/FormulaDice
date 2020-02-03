<?php
require_once('common.php');

$name=$_GET['name'];

add_DB('insert into UserData(name) values(?)',[$name]);

$data = get_DB('select max(id) as maxid from UserData');

$myid=$data['maxid'];

$result=get_DB('select room_name from RoomList where is_join=0 limit 1');

$leader=false;

if($result)
{
    add_DB('insert into {$result}(name) values(?)',[$name]);
    
}
else
{
    $sql="create table '{$myid}'_room(id int AUTO_INCREMENT, name varchar(64))";

    add_DB($sql);

    $sql="insert into RoomList(room_name,is_join) values('{$myid}'_room,0)";

    add_DB($sql);

    $leader=true;
}

$param = [
    'id' => $myid,
    'is_leader' => $leader
];


echo json_encode($param);