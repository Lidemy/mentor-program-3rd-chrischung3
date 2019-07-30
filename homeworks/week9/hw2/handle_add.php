<?php

require_once('./conn.php');

$user_id = $_POST['user_id'];
$content = $_POST['content'];

if(empty($content)) {
	die('請輸入你想說的話');
}

$sql = "INSERT INTO chrischung2_msgBoard(user_id, content) VALUES ('$user_id', '$content')";

$result = $conn->query($sql);
if($result) {
	header('Location: ./index.php');
} else {
	echo 'failed: '. $conn->error;
}

?>