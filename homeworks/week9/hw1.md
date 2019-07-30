## 資料庫
資料庫名稱：msg_board

| 欄位名稱 | 欄位型態 | 說明 |
|----------|----------|------|
|  id  |    integer      | 留言 id     |
| user_id | integer | 使用者id |
| content | text | 留言內容  |
| created_at | datetime | 留言時間 |


資料庫名稱：users

| 欄位名稱 | 欄位型態 | 說明 |
|----------|----------|------|
|  id  |    integer      | 留言 id     |
| username | varchar(16) | 帳號 |
| password | varchar(16) | 密碼 |
| nick | varchar(32) | 暱稱 |
| created_at | datetime | 帳號建立時間  |


## 需要的頁面
* index.php -> 可以看到所有留言的頁面
* login.php -> 登入頁面
* handle_login.php -> 登入
* add.php ->新增留言頁面
* handle_add.php -> 新增留言
* register.php -> 註冊帳號頁面
* handle_register.php -> 建立帳號
* logout.php -> 登出


## 使用者路徑
index.php -> login.php -> register.php / handle_register.php -> login.php / handle_login.php -> index.php -> add.php / handle_add.php -> index.php
