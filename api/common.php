<?php
function add_DB($sql,$param=[]){
    $dsn  = 'mysql:dbname=db1337;host=localhost';
    $user = 'my1337';
   //$user='senpai';
    $pw   = 'kghtaffr';
   //$pw='indocurry';

    $dbh = new PDO($dsn,$user,$pw);
    $sth = $dbh->prepare($sql);
    $sth->execute($param);

    //return ($sth->fetch(PDO::FETCH_ASSOC));
}

function get_DB($sql,$param=[]){
    $dsn  = 'mysql:dbname=db1337;host=localhost';
    $user = 'my1337';
   //$user='senpai';
    $pw   = 'kghtaffr';
   //$pw='indocurry';

    $dbh = new PDO($dsn,$user,$pw);
    $sth = $dbh->prepare($sql);
    $sth->execute($param);

    return ($sth->fetch(PDO::FETCH_ASSOC));
}