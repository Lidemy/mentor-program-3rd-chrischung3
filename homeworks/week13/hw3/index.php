
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
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
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
				$sql_user = "SELECT U.id as userId, U.username FROM chrischung2_users_certificate as C LEFT JOIN chrischung2_users as U ON U.username = C.username";
				$result_user = $conn->query($sql_user);
				if($result_user->num_rows > 0){
					$row_user = $result_user->fetch_assoc();
					$theUser = $row_user['userId'];
				}
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

			$sql = "
			SELECT U.id as userId, U.username, U.nick, M.content, M.created_at, M.id as msgId 
			FROM chrischung2_users as U 
			LEFT JOIN chrischung2_msgBoard as M 
			ON M.user_id = U.id 
			WHERE M.parent_id = 0 
			ORDER BY created_at DESC 
			LIMIT $start, $per
			";
			$result = $conn->query($sql);

			if($result->num_rows <= 0) {
				echo "error" . $conn->error;
			} else {
				while($row = $result->fetch_assoc()){
					echo "<div class='post'>";
					echo   "<div class='users__nick'>" . htmlspecialchars($row['nick'], ENT_QUOTES, 'utf-8') . "</div>";
					echo   "<p class='users__content'>" . htmlspecialchars($row['content'], ENT_QUOTES, 'utf-8') . "</p>";
					echo   "<div class='created__at'>留言時間： " . $row['created_at'] . "</div>";
					
					if(isset($_COOKIE['username'])){
						if($row['username'] === $_COOKIE['username']) {
							echo "<div class='edit'>";
							  echo "<button class='update__post btn btn-dark' href='./update.php?id=" . $row['msgId'] . "'>編輯</button> ";
							  echo "<button class='delete__post btn btn-dark' msgId=" . $row['msgId'] . ">刪除</button>";
							echo "</div>";
						} //如果是原作者的話可以編輯跟刪除
					}
					?>
					<div class='sub-comments'>
						<?php

						$parent_id = $row['msgId'];
						
						$sql_sub = "
						SELECT U.id as userId, U.username, U.nick, M.content, M.created_at, M.id as msgId 
						FROM chrischung2_users as U 
						LEFT JOIN chrischung2_msgBoard as M 
						ON M.user_id = U.id 
						WHERE M.parent_id = $parent_id
						ORDER BY created_at DESC
						";

						$result_sub = $conn->query($sql_sub);

						if($result_sub){
							while($row_sub = $result_sub->fetch_assoc()) {
						?>
								<div class='sub-comment'>
									<div class='sub-comment__nick'><?php echo $row_sub['nick']?></div>
									<div class='sub-comment__content'><?php echo $row_sub['content']?></div>
									<div class='sub-comment__created-at'>留言時間：<?php echo $row_sub['created_at']?></div>
								</div>

						<?php
							}
						}
						?> 
						<div class='add__sub-comment'>
							<form method='POST' action='./handle_add.php'>
								<div>你想說什麼：</div>
								<input type='hidden' name='parent_id' value="<?php echo $parent_id ?>" />
								<div><textarea name='content' style='width:500px;height:80px'></textarea></div>
								<input type='hidden' name='user_id' value="<?php echo $theUser ?>" />
								<button class="btn btn-info" type='submit' value='送出' >送出</button>
							</form>
						</div> 
					</div>
					
					<?php
					echo "</div>"; //closing div for class='post'
				}
			}
			?>

		</div>  
	</div> 
	<script src="./index.js"></script>
</body>

</html>