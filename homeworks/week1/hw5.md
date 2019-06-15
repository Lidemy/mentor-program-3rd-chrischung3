## 請解釋後端與前端的差異。

#### 前端
前端就是我們看得到的東西，主要由三種東西構成：HTML、CSS 及 JavaScript。其中最重要的是 HTML，因為要透過 HTML 瀏覽器才能讀懂資料並且顯示出內容與結構。另外 CSS 主要是負責網頁外觀的部分，而 JavaScript 就是程式的部分（邏輯、運算、表單驗證）

#### 後端
後端就是我們看不到的東西，包含 Server 與 Database。


## 假設我今天去 Google 首頁搜尋框打上：JavaScript 並且按下 Enter，請說出從這一刻開始到我看到搜尋結果為止發生在背後的事情。

Step0. 因為已經在 Google.com 了，所以假設已經取得 Google.com 的 IP address
Step1. Browser 送 Request 給 Server
Step2. Server 跟 Database 詢問有關 Javascript 的資料
Step3. Database 找到之後，將結果回傳給 Server
Step4. Server 回傳 Response 給 Browser
Step5. Browser 顯示出接收到的資料


## 請列舉出 5 個 command line 指令並且說明功用

`alias`
可以把常用的指令用一個簡稱代替。例如：`alias pd = pwd`，之後只要輸入 pd 就可以執行 pwd 的指令了。

`sort`
此指令可以排序一個檔案內的資料。例如：`sort test.txt`，在 Terminal 的介面中就可以看到排序結果。

`ping`
在測試網路環境的時候很常使用的指令，可以針對某一 IP 位址打封包，並且回傳測試結果。例如 `ping 8.8.8.8`

`traceroute`
另一個在測試網路環境時很常使用的指令，可以針對某一 destination IP address 的方向去偵測中間經過的 routing point。而 `traceroute6` 則用在 IPv6 的環境中。

`ipconfig`
可以用這個指令對目前使用的機器設備設定網路參數。


