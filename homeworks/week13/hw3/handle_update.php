<?php

require_once('./conn.php');

$id = $_POST['id'];
$content = $_POST['content'];
$user = $_COOKIE['username'];

if(empty($content)) {
	die('請輸入你想說的話');
}

$sql = "SELECT * FROM chrischung2_msgBoard as M LEFT JOIN chrischung2_users as U ON M.user_id = U.id";
$result = $conn->query($sql);

if($result->num_rows > 0) {
	$row = $result->fetch_assoc();
	if($row['username'] = $user) {
		$stmt = $conn->prepare("UPDATE chrischung2_msgBoard SET content =? WHERE id ='$id'");
		$stmt->bind_param("s", $content);
		$stmt->execute();
		header('Location: ./index.php');
	}
}

?>