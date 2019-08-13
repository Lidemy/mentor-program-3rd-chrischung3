<?php

require_once('./conn.php');
$nick = $_POST['nick'];
$username = $_POST['username'];
$password = $_POST['password'];

$hash = password_hash($password, PASSWORD_DEFAULT);

if(empty($username) || empty($password) || empty($nick)) {
	die('帳號密碼暱稱不能為空');
} else {
	$repeatNick = "SELECT nick from chrischung2_users WHERE nick = '$nick'";
	$repeatUsername = "SELECT username from chrischung2_users WHERE username = '$username'";
	if($conn->query($repeatNick)->num_rows !== 0){
		header("Location: ./register.php?Message=" . '這個暱稱有人用了！');
	} else if($conn->query($repeatUsername)->num_rows !== 0) {
		header("Location: ./register.php?Message=" . '這個帳號有人用了！');
	} else {
		$sql = "INSERT INTO chrischung2_users(username, nick, password) VALUES ('$username', '$nick', '$hash')";
	}

	$result = $conn->query($sql);
	if($result){
		header("Location: ./login.php?Message=" . '註冊成功！請重新登入！');
	} else {
		header("Location: ./register.php?Message=" . '網頁出錯, 請重試一次');
	}
}

?>