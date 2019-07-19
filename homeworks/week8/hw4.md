## 什麼是 Ajax？
Asynchronous JavaScript and XML 的簡稱。
Asynchronous，非對稱，讓網頁不會因為 server 的 response 太慢而卡住。一個例子就像是我打電話給朋友問一件事情但是他沒有接，因此我可以先留言，等他有空了再回電，而我就不需要一直打到他接電話為止，可以先去做其他事情。

## 用 Ajax 與我們用表單送出資料的差別在哪？
如果用 Ajax，server 回傳的資料會透過 browser 再回傳到 JavaScript 手上。如果用表單的話，Server 回傳的資料會直接在 browser 被 render 出來（對使用者來看就是直接換頁的感覺。）

## JSONP 是什麼？
JSON with Padding，特點是可以不受同源政策影響，不過現在很少人用了。

## 要如何存取跨網域的 API？
1. Server 把 access-control-allow-origin 的值設成 * 就可以存取了
2. 如果是自己的 server，人在外可以透過 VPN 連進去存取

## 為什麼我們在第四週時沒碰到跨網域的問題，這週卻碰到了？
因為同源政策是瀏覽器為了安全性考量而給的限制，第四週的時候是直接用 node.js 發 request，並沒有透過瀏覽器，所以就沒有這個問題。
