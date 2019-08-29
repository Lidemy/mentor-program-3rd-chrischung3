<?php require_once('./conn.php'); ?>

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
			if(isset($_COOKIE['PHPSESSID'])) {
				$sessId = $_COOKIE['PHPSESSID'];
				$sql = "SELECT * from chrischung2_users_certificate WHERE id = '$sessId'";
				$result = $conn->query($sql);
				$row = $result->fetch_assoc();
				echo "<a class='active' href='./add.php'>新增留言</a>";
				echo "<a href='./logout.php'>登出</a>";
				echo "<p>歡迎，" . $row['username'] . "</p>";
			} else {
				echo "<a href='./login.php'>登入</a>";
			}
		?>
	</nav>

	<div class='other__wrapper'>

		<?php 
			if(isset($_COOKIE['username'])){
				$username = $_COOKIE['username'];
				$id = $_GET['id'];
				$sql = "SELECT U.id, U.username, M.content, M.user_id, M.id from chrischung2_users as U LEFT JOIN chrischung2_msgBoard as M ON M.id = '$id' WHERE U.username = '$username'";
				$result = $conn->query($sql);
				$row = $result->fetch_assoc();
		?>
				<form method='POST' action='./handle_update.php'>
					<div>你想說什麼：<textarea name='content' rows='10'><?php echo $row['content'];?></textarea></div>
					<input type='hidden' name='id' value="<?php echo $row['id'] ?>" />
					<input type='submit' value='送出' />
				</form>
		<?php
			} else {
				header("Location: ./login.php?Message=" . '請先登入！');
			}
		?>
	</div>
</body>

</html>