## 請說明雜湊跟加密的差別在哪裡，為什麼密碼要雜湊過後才存入資料庫
雜湊加密的特性在於它是一個 one-way function，意思就是 a 經過這個函式可以得到 b，但是拿到 b 並沒部分會推 a。也因為具備這種特性，存在資料庫中的密碼必須是 hashed，如果有一天被駭，還可比較不容易取得原本真正的密碼。

## 請舉出三種不同的雜湊函數
md5：這堂課教的，算是比較簡單，安全性也較低的 hash function
sha256：之前在區塊鏈公司任職，區塊鏈普遍都是用這種加密方式，算是安全性較高的 hash function
crc 系列：以前任職於網通公司的時候，都會用這種方式來測試網路環境

## 請去查什麼是 Session，以及 Session 跟 Cookie 的差別
用戶第一次從瀏覽器登入的時候，會由伺服器端產生一個 Session 和 Session ID 來識別這個 Session。而這個 Session ID 會被儲存在瀏覽器中，下一次瀏覽器發 request 上來的時候會帶著 Session ID 到伺服器，當伺服器看到這個 Session ID 時就與資料庫裡面的資料比對，確認存在的話就可以通過。

Session 跟 Cookie 最大的差異是：Session 的資料是儲存在伺服器中，而 Cookie 是儲存在 Client 端，所以 Cookie 的資料比較容易被竄改。但也因為這樣的特性，Session 比較耗伺服器的資源，而 Cookie 不會。

##  `include`、`require`、`include_once`、`require_once` 的差別
這四個指令都是引入檔案的指令，差別如下：
* include：引入檔案時若錯誤，會出現錯誤訊息，但是程式不會停止。
* include_once：與 include 相同，但是可以避免重複引入。
* require：引入檔案時若錯誤，會出現錯誤訊息，且程式不會停止。
* require_once：與 require 相同，但是可以避免重複引入。