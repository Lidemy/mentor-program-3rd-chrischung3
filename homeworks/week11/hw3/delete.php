<?php

require_once('./conn.php');

$id = '';

if(isset($_GET['id'])) {
	$id = $_GET['id'];
}

$sql = "DELETE FROM chrischung2_msgBoard WHERE id = {$id}";

$result = $conn->query($sql);

if($result) {
	header("Location: ./index.php?Message=" . "刪除成功！");
} else {
	header("Location: ./index.php?Message=" . "操作失敗，請再試一次！");
}

?>