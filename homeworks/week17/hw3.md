## 請說明以下程式碼會輸出什麼，以及盡可能詳細地解釋原因。
```
var a = 1
function fn(){
  console.log(a)
  var a = 5
  console.log(a)
  a++
  var a
  fn2()
  console.log(a)
  function fn2(){
    console.log(a)
    a = 20
    b = 100
  }
}
fn()
console.log(a)
a = 10
console.log(a)
console.log(b)
```

## 答案
### 解答
undefined
5
6
20
1
10
100

### 步驟
  先進行 Global EC 的編譯
```
	global VO:{
		a: undefined,
		fn: 0x11,
	}
```
  開始執行 Global EC
  var a = 1
```
    global VO:{
    	a: 1,
    	fn: 0x11,
    }
```
  遇到 fn()，進行 fn() EC 的編譯
```
    fn() VO: {
    	a: undefinied
    	fn2: 0x22
    }
    
    global VO:{
    	a: 1,
    	fn: 0x11,
    }
```
  開始執行 fn()
  console.log(a) = undefined
  var a = 5
```
    fn() VO: {
    	a: 5
    	fn2: 0x22
    }
    
    global VO:{
    	a: 1,
    	fn: 0x11,
    }
```
  console.log(a) = 5
  a++
```
    fn() VO: {
    	a: 5
    	fn2: 0x22
    }
    
    global VO:{
    	a: 1,
    	fn: 0x11,
    }
```
  var a 不會造成任何改變
  遇到 fn2()，進行 fn2 EC 的編譯
```
    fn2() VO: {
    	沒有宣告變數或新的function
    }

    fn() VO: {
    	a: 5
    	fn2: 0x22
    }
    
    global VO:{
    	a: 1,
    	fn: 0x11,
    }
```
  開始執行 fn2()
  console.log(a) = 6，在 fn2() VO 裡面找不到，因此到上一層 fn() VO 中取得
  a = 20
```
    fn2() VO: {
    	沒有宣告變數或新的function
    }

    fn() VO: {
    	a: 20  //因為 fn2 裡面沒有，因此往外找並賦值
    	fn2: 0x22
    }
    
    global VO:{
    	a: 1,
    	fn: 0x11,
    }
```
  b = 100
```
    fn2() VO: {
    	沒有宣告變數或新的function
    }

    fn() VO: {
    	a: 20
    	fn2: 0x22
    }
    
    global VO:{
    	a: 1,
    	fn: 0x11,
    	b: 100 // 都找不到變數因此在最根部建立 b 並賦值
    }
```
  fn2() 結束，pop，回答 fn() EC，繼續執行 console.log(a) = 20
  fn() 結束，pop，回到 global EC，繼續執行 console.log(a) = 1
  a = 10
```
    global VO:{
    	a: 10,
    	fn: 0x11,
    	b: 100 
    }
```
  console.log(a) = 10
  console.log(b) = 100
