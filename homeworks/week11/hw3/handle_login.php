<?php

require_once('./conn.php');

$username = $_POST['username'];
$password = $_POST['password'];

if(empty($username) || empty($password)) {
	header("Location: ./login.php?Message=" . '帳號密碼不能為空');
} else {
	$sql = "SELECT * from chrischung2_users WHERE username = '$username'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	if(!$result) {
		header("Location: ./login.php?Message=" . '出錯了，請重新登入！');
		exit();
	}
	if($result->num_rows > 0){
		if(password_verify($password, $row["password"])) {
			setcookie('username', $username, time()+86400);
			session_start();

			$session_id = session_id();
			$session_username = $row['username'];

			$session_sql = "INSERT INTO chrischung2_users_certificate(id, username) VALUES ('$session_id', '$session_username')";

			$session_result = $conn->query($session_sql);

			header("Location: ./index.php?Message=" . "登入成功！歡迎～");
		} else {
			header("Location: ./login.php?Message=" . '帳號或密碼錯誤');
		}
	}
}

?>