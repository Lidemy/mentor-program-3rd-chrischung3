
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
		<a class='active' href='./index.php'>首頁</a>
		<?php
			if(isset($_COOKIE['username'])) {
				$sql = "SELECT * from chrischung2_users WHERE username = '$_COOKIE[username]'";
				$result = $conn->query($sql);
				$row = $result->fetch_assoc();
				echo "<a href='./add.php'>新增留言</a>";
				echo "<a href='./logout.php'>登出</a>";
				echo "<p>歡迎，" . $row['nick'] . "</p>";
			} else {
				echo "<a href='./login.php'>登入</a>";
			}

		?>
	</nav>

	<div class='wrapper'>
		<div class='posts'>
			<?php

			$sql = "SELECT U.nick, M.content, M.created_at FROM chrischung2_msgBoard as M LEFT JOIN chrischung2_users as U ON M.user_id = U.id ORDER BY created_at DESC";
			$result = $conn->query($sql);

			if($result->num_rows > 0) {
				while($row = $result->fetch_assoc()){
					echo "<div class='post'>";
					echo   "<div class='users__nick'>" . $row['nick'] . "</div>";
					echo   "<p class='users__content'>" . $row['content'] . "</p>";
					echo   "<div class='created__at'>留言時間： " . $row['created_at'] . "</div>";
					echo "</div>";
				}
			}
			?>

		</div>
	</div>
</body>

</html>