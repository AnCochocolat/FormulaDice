<?php
require_once('common.php');

//部屋人数をカウント
$count_sql="select count(*) as max_count from $room";

//sqlから部屋人数取得
$result=get_DB($count_sql);

//部屋人数を変数に保持
$count=$result['max_count'];

$param=[
    'count'=>$count
];

echo json_encode($param); 