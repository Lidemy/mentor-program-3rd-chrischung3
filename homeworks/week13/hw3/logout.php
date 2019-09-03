<?php

require_once('./conn.php');

$session_id = $_COOKIE['PHPSESSID'];
$sql = "DELETE FROM chrischung2_users_certificate WHERE id = '$session_id'";
$result = $conn->query($sql);

if($result) {
	setcookie('PHPSESSID', '', time()-86400, '/');
	setcookie('username', '', time()-86400);
	header('Location: ./index.php');
} else {
	header("Location: ./index.php?Message=" . '出錯了！請再試一次！');
}

?>
