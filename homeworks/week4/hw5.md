## 請以自己的話解釋 API 是什麼
一直以來我都會把 API 具象化成一種電影中常見的場景：外太空中，在危急的時刻，R2D2 伸出自己的一隻接頭，插進了敵對船艦牆壁上的某個 port，然後讀取敵艦資訊。在這個畫面中，艦上的 port 就是提供 Data 的 API，而 R2D2 是去串接 API 的（機器）人。

圖：https://starwarsblog.starwars.com/wp-content/uploads/sites/6/2015/04/Screen-Shot-2015-04-14-at-10.09.19-AM.jpg

API 是個接入口，讓想要存取我的資料的人，可以透過他存取我的資料庫。
而在這個 API 上面，我可以設定「誰」可以存取（權限），然後他們可以存取「哪些」資料。

我覺得這就是 API。


## 請找出三個課程沒教的 HTTP status code 並簡單介紹

201：Created
在 hw3 時發現，代表我成功在資料庫中新增資料。

401：Unauthorzied 沒有被授權。
這個我最有感，在做這週 hw4 的時候，當 response.statusCode 從 404 改變成為 401 的時候我非常興奮，因為代表整個作業我已經完成一半了，為什麼呢？因為 404 代表說我要求的東西 db 裡面沒有，而 401 代表我要找的東西存在，只是我還沒有被授權，所以我只需要再解決授權的問題就可以了。

418：I'm a teapot
這是 IETF 的愚人節玩笑，在 RFC 2324 超文字咖啡壺控制協定中定義的，如果提出煮咖啡（brew coffee）的要求時，可以回覆我是個茶壺，不是咖啡機。


## 假設你現在是個餐廳平台，需要提供 API 給別人串接並提供基本的 CRUD 功能，包括：回傳所有餐廳資料、回傳單一餐廳資料、刪除餐廳、新增餐廳、更改餐廳，你的 API 會長什麼樣子？請提供一份 API 文件。

Base URL: www.restaurantlist.com

| 說明 | Method | Path | 參數 | 
|:---:|:---:|:---:|:---:|
| 取得所有餐廳資料 | GET | /list | _limit:限制餐廳數量 |
| 取得單一餐廳資料 | GET | /list/:id | 無 | 
| 刪除某餐廳資料 | DELETE | /list/:id | 無 | 
| 新增某餐廳資料 | POST | /list/ | name: 餐廳名 | 
| 更改某餐廳資料 | PATCH | /list/:id | name: 餐廳名 | 
