## CSS 預處理器是什麼？我們可以不用它嗎？
CSS 預處理器讓我們可以更方便寫出 CSS，因為他提供了宣告變數及函式的功能，然工程師在設計網頁或維護的時候更方便，可以從一個地方去修改許多地方的。
當然可以不用他，只是會比較麻煩。就像我們也可以不用 bootstrap 做 navbar，只是自己刻就會很費工，後續的維護也比較不容易。

## 請舉出任何一個跟 HTTP Cache 有關的 Header 並說明其作用。
    Cache Control: max-age= n (sec)
這個 Header 的意思就是這個快取檔案有效期限有多久

    Cache Control: no-store
完全不使用快取，每一次都要重新下載

	Cache Control: no-cache
每一次只檢查是否有新檔案，沒有的話可以沿用之前儲存的快取檔案

## Stack 跟 Queue 的差別是什麼？
Stack 是 First In Last Out。
Queue 是 First In First Out。

## 請去查詢資料並解釋 CSS Selector 的權重是如何計算的（不要複製貼上，請自己思考過一遍再自己寫出來）
這個部分我覺得老師在 CSS 的那週講得蠻清楚的，我就把我的筆記寫下來：
CSS 的權重計算可以分成五位數

| 位數 | 1  |  2  | 3 | 4 | 5 |
| :---: | :----: | :---: | :----: | :---: | :---: |
| 內容 | !important | inline style | id | class/attr | tag |

如果今天有一個 CSS 指令換算出來的權重是 1/0/0/0/0，那他的權重會比其他，例如 0/1/0/0/0 或 0/0/1/3/0 還要高，以此類推。
