<?php

require_once('./conn.php');

$id = '';

// 改成從 ajax 送過來的 id 資訊
// ajax 的 method 是 POST，所以這裡也改成 POST
if(isset($_POST['id'])) {
	$id = $_POST['id'];
}

$user = $_COOKIE['username'];

$sql = "SELECT M.id as msgId, U.username FROM chrischung2_msgBoard as M LEFT JOIN chrischung2_users as U ON M.user_id = U.id";
$result = $conn->query($sql);

if($result->num_rows > 0) {
	$row = $result->fetch_assoc();
	$id = $_POST['id'];
	if($row['username'] = $user) {
		$delete_sql = "DELETE FROM chrischung2_msgBoard WHERE id = {$id} OR parent_id = {$id}";
		// echo $delete_sql;

		$result = $conn->query($delete_sql);
		if($result) {

			// 從 Server 輸出 response 資訊
			echo json_encode(array(
				'result' => 'success',
				'message' => '刪除成功'
			));
		} else {
			// 從 Server 輸出 response 資訊
			echo json_encode(array(
				'result' => 'failed',
				'message' => '刪除失敗'
			));
		}
		
	}
}

?>