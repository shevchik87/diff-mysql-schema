<?php
require_once "Db.php";
require_once "CompareDb.php";
$db = new DB('localhost', 'radar', 'root', 'qazwsx8031984');
$db->connect();

$db1 = new DB('localhost', 'radar2', 'root', 'qazwsx8031984');
$db1->connect();
$compare = new CompareDb($db, $db1);
$compare->compare();
