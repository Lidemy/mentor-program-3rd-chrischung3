## 請找出三個課程裡面沒提到的 HTML 標籤並一一說明作用。

<i></i> 這個 tag 通常用來強調一個詞的情緒。在 HTML5 之前，這個 tag 可以直接 render 出斜體字，HTML5 的話可以用 CSS 來定義這個 tag 裡面的內容長相。

<mark></mark> 用來 highlight 其中一部分文字。

<strike> </strike> 在文字上加上刪除線


## 請問什麼是盒模型（box modal）

HTML 的每一個 div 的內容都可以視為一個 box，而針對這個 box 我們就可以調整他的 margin、border、padding、content 等各個屬性。我自己會以 border 為分野，border 就是外框。margin 在 border 的外面，所以 margin 是這個物件跟其他物件的距離。padding 在 border 的裡面，所以 padding 就是 content 到 border 的距離。


## 請問 display: inline, block 跟 inline-block 的差別是什麼？

#### block
元素以區塊的方式呈現。可以調整區塊的長寬及邊距。但是一個區塊就會佔滿一整行，其他物件都會換行。
有些 tag default 用 block display，如 div、p、h1～h6、ul 等。

#### inline
元素以橫向並排的方式呈現，但是沒辦法調整區塊的長寬及邊距。
有些 tag default 用 inline display，如 a、span 等。

#### inline-block
元素仍以區塊的方式呈現，但是如同 block 一樣，可以調整區塊的長寬及邊距。
透過 css，什麼tag 都可以用 inline-block 的方式呈現。


## 請問 position: static, relative, absolute 跟 fixed 的差別是什麼？

#### static
所有元素的預設值。都是從 viewport 的最上角開始，第一個元素有多少 margin、block、padding、content 寬度，這些寬度加完之後，第二個元素就從這裡開始，以此類推。

#### relative
元素仍然在其預設值的地方，但是可以透過 top、bottom、left、right 去調整顯示的地方。

#### absolute
元素會以上層非 static 的元素為定位基準。但如果上層沒有符合的元素，則會根據 body 定位。用 absolute 的話，該元素會從排版流程中被拔出，下一個元素會遞補他的位子。

#### fixed
以目前的 viewport 定位，固定在固定位置，不會因為滾動捲軸拉動而改變位置。常見使用 fixed display 的元素有廣告，或者是客服聊天視窗等。
