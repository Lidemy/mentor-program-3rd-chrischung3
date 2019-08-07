
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
			if(isset($_COOKIE['PHPSESSID'])) {
				$sessId = $_COOKIE['PHPSESSID'];
				$sql = "SELECT * from chrischung2_users_certificate WHERE id = '$sessId'";
				$result = $conn->query($sql);
				$row = $result->fetch_assoc();
				echo "<a href='./add.php'>新增留言</a>";
				echo "<a href='./logout.php'>登出</a>";
				echo "<p>歡迎，" . $row['username'] . "</p>";
			} else {
				echo "<a href='./login.php'>登入</a>";
			}
		?>
	</nav>

	<div class='pages'>
		<?php
		$pages_sql = "SELECT * from chrischung2_msgBoard";
		$result = $conn->query($pages_sql);
		
		$posts = $result->num_rows;  // 總 PO 文數
		$per = 10; // 每頁 10 PO 文
		$total = ceil($posts/$per);
		if(!isset($_GET['page'])){
			$page = 1;
		} else {
			$page = intval($_GET['page']);
		}

		$start = ($page-1)*$per; //每一頁開始的資料序號

		echo "<span> 頁數 <span>";
		for($i = 1; $i <= $total; $i++ ) {
			echo "<span><a href='./index.php?page=$i'> " .$i . " </a></span> ";
		}

		?>
	</div>

	<div class='wrapper'>
		<div class='posts'>
			<?php

			$sql = "SELECT U.username, U.nick, M.content, M.created_at, M.id FROM chrischung2_users as U LEFT JOIN chrischung2_msgBoard as M ON M.user_id = U.id ORDER BY created_at DESC LIMIT $start, $per";
			$result = $conn->query($sql);

			if($result->num_rows <= 0) {
				echo "error" . $conn->error;
			} else {
				while($row = $result->fetch_assoc()){
					echo "<div class='post'>";
					echo   "<div class='users__nick'>" . $row['nick'] . "</div>";
					echo   "<p class='users__content'>" . $row['content'] . "</p>";
					echo   "<div class='created__at'>留言時間： " . $row['created_at'] . "</div>";
					
					if(isset($_COOKIE['username'])){
						if($row['username'] === $_COOKIE['username']) {
							echo "<div class='edit'>";
							  echo "<a href='./update.php?id=" . $row['id'] . "'>編輯</a> ";
							  echo "<a href='./delete.php?id=" . $row['id'] . "'>刪除</a>";
							echo "</div>";
						}
					}
					echo "</div>";
				}
			}

			?>

		</div>
	</div>
</body>

</html>