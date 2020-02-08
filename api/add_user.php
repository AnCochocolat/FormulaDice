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

    $count_sql="select count(*) as max_count from $result_room";
    $result=get_DB($count_sql);
    $player_count=$result['max_count'];

    if($player_count==4){
    $sql="update RoomList set is_join=0 where room_name=?";
    add_DB($sql,[$result_room]);
    }
}
else
{
    $sql="create table $room(
        id int AUTO_INCREMENT, 
        name varchar(64),
        _c_mileage int default 0,
        _distance int default 110,
        _e_mileage int default 20,
        _attack_count int default 5,
        PRIMARY KEY(id)
        )";

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