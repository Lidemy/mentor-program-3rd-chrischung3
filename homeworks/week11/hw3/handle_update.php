<?php

require_once('./conn.php');

$id = $_POST['id'];
$content = $_POST['content'];

if(empty($content)) {
	die('請輸入你想說的話');
}

$sql = "UPDATE chrischung2_msgBoard SET content = '$content' WHERE id = '$id'";

$result = $conn->query($sql);
if($result) {
	header('Location: ./index.php');
} else {
	echo 'failed: '. $conn->error;
}

?>