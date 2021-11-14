<?php

session_start();

require_once("includes.php");

includes_src_dir();



$MYSQL_HOST   = "mysql.info.unicaen.fr";
$MYSQL_DBNAME = "21910271_1";
$MYSQL_USER   = "21910271";
$MYSQL_PASS   = "ma1eepheT5seiKia";

$accs = new AccountStorageMySQL(
    $MYSQL_HOST,
    $MYSQL_DBNAME,
    $MYSQL_USER,
    $MYSQL_PASS
);

$mus = new MusiqueStorageMySQL(
    $MYSQL_HOST,
    $MYSQL_DBNAME,
    $MYSQL_USER,
    $MYSQL_PASS
);

$r = new Router($accs, $mus);
$r->main();

?>
