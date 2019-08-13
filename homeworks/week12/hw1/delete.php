<?php

require_once('./conn.php');

$id = '';

if(isset($_GET['id'])) {
	$id = $_GET['id'];
}

$user = $_COOKIE['username'];

$sql = "SELECT * FROM chrischung2_msgBoard as M LEFT JOIN chrischung2_users as U ON M.user_id = U.id";
$result = $conn->query($sql);

if($result->num_rows > 0) {
	$row = $result->fetch_assoc();
	$id = $_GET['id'];
	if($row['username'] = $user) {
		$delete_sql = "DELETE FROM chrischung2_msgBoard WHERE id = {$id} OR parent_id = {$id}";
		echo $delete_sql;
		
		$result = $conn->query($delete_sql);
		if($result) {
			header("Location: ./index.php?Message=" . "刪除成功！");
		} else {
			header("Location: ./index.php?Message=" . "操作失敗，請再試一次！");
		}
		
	}
}

/*
if($user = )
$delete_sql = "DELETE FROM chrischung2_msgBoard WHERE id = {$id}";

$result = $conn->query($sql);

if($result) {
	header("Location: ./index.php?Message=" . "刪除成功！");
} else {
	header("Location: ./index.php?Message=" . "操作失敗，請再試一次！");
}
*/
?>