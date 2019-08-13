## 請說明 SQL Injection 的攻擊原理以及防範方法

####攻擊原理
在需要讀取資料庫資訊的輸入欄位，輸入一些特殊字元，更改整個 SQL 指令，並造成錯誤或者是取得資料庫資訊

#### 防範方法
用 prepare statement 的方式即可防範
範例：
$stmt = $conn->prepare("SELECT * FROM users WHERE username = ？");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

## 請說明 XSS 的攻擊原理以及防範方法

#### 攻擊原理
在輸入欄位的地方輸入一些程式碼，造成瀏覽器在 render 畫面的時候也會執行輸入的程式碼，可能會導致畫面被破壞，甚至有可能被帶到不安全的網站去。

#### 防範方法
我們只需要確保瀏覽器在 render 畫面的時候，所有使用者輸入的資訊都被當作字串來執行。
所以在撈使用者輸入資料時，可以用 htmlspecialchars($str, ENT_QUOTES, ‘utf-8’) 去取代原本只有要輸入 $str 的地方。

## 請說明 CSRF 的攻擊原理以及防範方法

#### 攻擊原理
攻擊者在原網站的 url 後面新增一些資訊，使用者可能看到 url 的前半部分是自己認識的網站而點選，殊不知後面攻擊者新增的資訊會讓這個使用者在點選 url 的時候以自己的名義去發出自己原本沒有要發出的 request。網站的 server 也認不出來是攻擊，因為隨著這個 request 帶上來的 cookie 確實是該使用者的資訊。

#### 防範方法
可以加上「圖片識別的驗證碼」或者是「簡訊密碼」，或者是第三方軟體如「Google Authenticator」等。

