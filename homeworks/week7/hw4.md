## 什麼是 DOM？
DOM 是 Document Object Model，是瀏覽器提供的橋樑，讓我們可以用 JavaScript 去 access HTML 和 CSS。
HTML 和 CSS 都是階層式的概念，而把這樣的內容很雷同於 JavaScript 中物件的概念，因此透過 DOM 的方式讓 JavaScript 存取 HTML 及 CSS 的內容，並針對裡面的元素去改動或增減。

## 事件傳遞機制的順序是什麼；什麼是冒泡，什麼又是捕獲？
事件傳遞機制的順序分成兩個階段：捕獲跟冒泡。
在點擊一個元素的時候，事件會從根節點開始往下去找到點擊的物件（target），這個階段就是捕獲的階段。
而捕獲之後，事件會再從子節點往上傳回根節點，這就是冒泡的過程。 
在 addEventListener() 裡面第三個參數是 boolean：其中 true 代表把這個 listener 添加到捕獲階段，false 或是沒有傳就代表把這個 listener 添加到冒泡階段。

## 什麼是 event delegation，為什麼我們需要它？
event delegation 就是當我們有一堆節點想要加 eventListener 的時候，可以找這群節點的 parent node 加 eventListener，目的是可以減少監聽數。
這次的作業 hw3 計算機就是在 .btn-pad 上加 eventListener，而不是對裡面的 15 個 .btn 加 eventListener。

## event.preventDefault() 跟 event.stopPropagation() 差在哪裡，可以舉個範例嗎？
event.stopPropagation() 的作用在於停止事件的傳遞到下一個節點，但是如果同個節點有其他的 EventListener 還是會執行，除非將指令改成 event.stopImmediatePropagaion()。
event.preventDefault() 的作用在與阻止瀏覽器預設的行為發生。跟時間傳遞沒關係。例如在某個 text input，如果我們要規範裡面只能有小寫，可以用 e.preventDefault()，讓使用者沒辦法輸入大寫（順便跳個 alert 提醒他），就不用到最後 submit 的時候才檢查。
