## 這週學了一大堆以前搞不懂的東西，你有變得更懂了嗎？請寫下你的心得。

有！這禮拜的課上完感覺就像是 Javascript 功法大躍進。以前不知道這些的時候所寫出來的 code 我開始覺得可能是誤打誤撞寫對的了...

先簡單條列一下這週所學，等到複習週的時候可能需要花點時間整理這週的筆記。

1. Hoisting: 終於知道為什麼有時候會出現 undefined 有時候會出現 variable is not defined 了

2. Event Loop + Call Stack: 其實老師分享的那個影片非常的有幫助，先看完之後老師教的東西就非常清楚了。這部分讓我知道 Javascipt 底層是怎麼跑的，重點是有時候 callback function 可能會跟我們想的不太一樣的時候，可能就是因為沒有注意到底層運作。

3. Scope: 了解變數的作用域之後，再次透過範例清楚知道 hoisting 會發生是因為程式會先編譯再執行，並且也延伸到用 closure 的方式保護變數。

4. 物件導向 class: class 就像是設計圖，可以先把一些 function 寫好，並且可以在設計具象化之後 (new)，針對該物件做變更，而且可以從一個設計圖做出多個不同物件。另外可以做出新的設計圖，其中部分沿用（inherit)原設計圖的內容。

5. Prototype: 我必須承認這是最難懂也最抽象的部分，但是學完之後大概知道有 prototype tree，並且不同的資料型態會在不同的 branch， 例如 String prototype、Object prototype，並且可以用 `.__proto__` 往上尋找。