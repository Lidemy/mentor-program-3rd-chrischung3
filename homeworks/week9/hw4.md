## 資料庫欄位型態 VARCHAR 跟 TEXT 的差別是什麼
varchar 可以限制字元的數量，如果確定輸入的字元有限，用 varchar 比較省資源。text 的話則沒有這個功能。


## Cookie 是什麼？在 HTTP 這一層要怎麼設定 Cookie，瀏覽器又會以什麼形式帶去 Server？
Cookie 是伺服器傳送給瀏覽器的一小段資料，瀏覽器會儲存，並且在下次發 request 給 server 的時候帶上這些資料。

HTTP 設定 cookie 時會在 Response Header 裡面放 Set-cookie 的資訊。
而之後在傳送 request 的時候，cookie 資訊會被夾帶在 request header 裡面帶去 server。



## 我們本週實作的會員系統，你能夠想到什麼潛在的問題嗎？
* 傳送的資料沒有加密，網路中如果有人 sniffer 感覺應該拿得到帳號密碼資料。比較安全的做法應該要由 server 傳送一段 hash 給 client 端，然後這個 hash 在 session 結束的時候就失效，下一次同個人再 login 的時候要傳送不同的 hash。
* 沒有地方可以刪除會員資料，違反歐盟 GDPR 個資法

