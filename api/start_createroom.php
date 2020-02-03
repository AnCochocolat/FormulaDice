<?php
require_once('common.php');

$name =$_GET['name'];

$data = get_DB('show tables like "join%"');

if($data>0){
    add_DB('insert into ');
}