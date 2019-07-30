<?php

require_once('./conn.php');

$username = $_POST['username'];
$password = $_POST['password'];

if(empty($username) || empty($password)) {
	alert('帳號密碼不能為空', './login.php');
} else {
	$sql = "SELECT * from chrischung2_users WHERE username = '$username' AND password = '$password'";
	$result = $conn->query($sql);
	if(!$result) {
		header("Location: ./login.php?Message=" . '出錯了，請重新登入！');
		exit();
	}
	if($result->num_rows > 0){
		setcookie('username', $username, time()+3600*24);
		header("Location: ./index.php?Message=" . "登入成功！歡迎～");
	} else {
		header("Location: ./login.php?Message=" . '帳號或密碼錯誤');
	}
}

?>