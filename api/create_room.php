<?php
require_once('common.php');

$name=$_GET['name'];

$id=$_GET['id'];

//$player_id=get_DB('select id from UserData where id=?',[$id]);



add_DB('create table join{$id}_room(id int AUTO_INCREMENT, name varchar(64))');