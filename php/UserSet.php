<?php
function getUserDB($sql,$param=[]){
    $dsn  = 'mysql:dbname = db1337;host=localhost';
    $user = 'my1337';
    $pw   = 'kghtaffr';

    $dbh = new PDO($dsn,$user,$pw);
    $sth = $dbh->prepare($sql);
    $sth->execute($param);

    return ($sth->fetch(PDO::FETCH_ASSOC));
}