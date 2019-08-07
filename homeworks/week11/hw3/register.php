
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

	<div class='other__wrapper'>
		<h1>註冊新帳號</h1>
		<div class="warning" color="black">「本站為練習用網站，因教學用途刻意忽略資安的實作，註冊時請勿使用任何真實的帳號或密碼」 </div>
		<form method='POST' action='./handle_register.php'>
			<div>帳號：<input type='text' name='username' id='username' required="required" /></div>
			<div>暱稱：<input type='text' name='nick' id='nick' required="required" /></div>
			<div>密碼：<input type='password' name='password' id='password' required="required" /></div>
			<input type='submit' value='註冊' />
		</form>
		
	</div>
</body>

</html>