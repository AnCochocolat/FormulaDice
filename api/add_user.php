<?php
require_once('common.php');

//入力された名前を取得
$name=$_GET['name'];

//UserDataテーブルにセット
add_DB('insert into UserData(name) values(?)',[$name]);

//自身のidを取得
$data = get_DB('select max(id) as maxid from UserData');

//idを変数に保持
$myid=$data['maxid'];

//参加可能な部屋を1つだけ探す
$join_result=get_DB('select room_name as room_Name from RoomList where is_join=1 limit 1');

//参加可能な部屋名を変数に保持
$result_room=$join_result['room_Name'];

//リーダーかどうか
$leader=false;

//部屋名
$room;

//参加可能な部屋があるかどうか
if($join_result)
{
    //参加可能な部屋に設定するsql作成
    $sql="insert into $result_room(name) values(?)";
    //テーブルに設定
    add_DB($sql,[$name]);
    
    //id設定
    $sql="update $result_room set _myid=$myid where name='$name'";

    //sqlに適応
    add_DB($sql);

    //部屋人数をカウント
    $count_sql="select count(*) as max_count from $result_room";

    //sqlから部屋人数取得
    $result=get_DB($count_sql);

    //部屋人数を変数に保持
    $player_count=$result['max_count'];

    //部屋人数が4人だったら
    if($player_count==4)
    {
        //部屋リストの参加可能フラグをfalseに
        $sql="update RoomList set is_join=0 where room_name=?";
        //sqlに適応
        add_DB($sql,[$result_room]);
    }
    $room=$result_room;
}
else
{

    $room= $myid."_room";

    //部屋のテーブル作成
    $sql="create table $room(
        id int AUTO_INCREMENT, 
        name varchar(64),
        _c_mileage int default 0,
        _distance int default 110,
        _e_mileage int default 20,
        _attack_use_mode int default 1,
        _is_goal int default 0,
        _myid int default 0,
        PRIMARY KEY(id)
        )";

    //作成したテーブルを適応
    add_DB($sql);
    
    //作成したテーブルを部屋リストにセットするsql作成
    $sql="insert into RoomList(room_name,is_join) values(?,1)";

    //sqlに適応
    add_DB($sql,[$room]);

    //部屋に自身のデータをセットするsql作成
    $sql="insert into $room(name) values(?)";

    //sqlに適応
    add_DB($sql,[$name]);

    //id設定
    $sql="update $room set _myid=$myid where name='$name'";

    //sqlに適応
    add_DB($sql);

    //リーダーフラグをtrueにする
    $leader=true;
}

//jsonでデータを返す用
$param = [
    'id' => $myid,
    'is_leader' => $leader,
    'room_name'=>$room
];

//jsonでデータを返す
echo json_encode($param);