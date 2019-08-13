<?php

session_start();
$sid = session_id();

echo $sid;
echo $_COOKIE['PHPSESSID'];

?>