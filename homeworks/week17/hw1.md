## 題目
請你說明以下程式碼會輸出什麼，以及盡可能詳細地解釋原因。

01| console.log(1)
02| 
03| setTimeout(() => {
04|   console.log(2)
05| }, 0)
06| 
07| console.log(3)
08|
09| setTimeout(() => {
10|  console.log(4)
11| }, 0)
12|
13| console.log(5)

## 解答
### 答案
會輸出 1 -> 3 -> 5 -> 2 -> 4

### 原因
步驟大略如下：
* 程式執行第 01 行，console.log(1) 進入 call stack，__**console 印出 1**__，console.log(1) pop
* 程式執行第 03 行，setTimeout 進入 call stack，被丟到 webapi，setTimeout pop，0 秒後 console.log(2) 被丟到 task queue 裡面排隊，佇列順序 = 1
* 程式執行第 07 行，console.log(3) 進入 call stack，__**console 印出 3**__，console.log(3) pop
* 程式執行第 09 行，setTimeout 進入 call stack，被丟到 webapi，setTimeout pop，0 秒後 console.log(4) 被丟到 task queue 裡面排隊，佇列順序 = 2
* 程式執行第 13 行，console.log(5) 進入 call stack，__**console 印出 5**__，console.log(5) pop
* Event Loop 發現 call stack 是空的，就把 task queue 佇列順序 = 1 的 console.log(2) 丟到 call stack 裡面，__**console 印出 2**__，console.log(2) pop，原本 task queue 佇列順序 = 2 的 console.log(4) 這時候變成 佇列順序 = 1
* Event Loop 發現 call stack 是空的，就把 task queue 佇列順序 = 1 的 console.log(4) 丟到 call stack 裡面，__**console 印出 4**__，console.log(4) pop