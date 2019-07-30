
<?php 
require_once('./conn.php'); 

if (isset($_GET['Message'])) {
    print '<script type="text/javascript">alert("' . $_GET['Message'] . '");</script>';
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8'>
	<title>Message Board</title>
	<link rel='stylesheet' href='./style.css'>
</head>

<body>
	<nav class='nav'>
		<h1>留言板</h1>
		<a href='./index.php'>首頁</a>
		<?php
			if(isset($_COOKIE['username'])) {
				$sql = "SELECT * from chrischung2_users WHERE username = '$_COOKIE[username]'";
				$result = $conn->query($sql);
				$row = $result->fetch_assoc();
				echo "<a href='./add.php'>新增留言</a>";
				echo "<a href='./logout.php'>登出</a>";
				echo "<p>歡迎，" . $row['nick'] . "</p>";
			} else {
				echo "<a class='active' href='./login.php'>登入</a>";
			}
		?>
	</nav>

	<div class='wrapper'>
		<h1>登入</h1>
		<form method='POST' action='./handle_login.php'>
			<div>帳號：<input type='text' name='username' id='username' required="required" /></div>
			<div>密碼：<input type='password' name='password' id='password' required="required" /></div>
			<input type='submit' value='送出' />
		</form>

		<a href='./register.php' id='register'>註冊</a>
		
	</div>
</body>

</html>