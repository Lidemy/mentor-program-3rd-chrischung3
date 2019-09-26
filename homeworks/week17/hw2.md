## 請說明以下程式碼會輸出什麼，以及盡可能詳細地解釋原因。

```
for(var i=0; i<5; i++) {
  console.log('i: ' + i)
  setTimeout(() => {
    console.log(i)
  }, i * 1000)
}
```

## 解答
### 答案
i: 0
i: 1
i: 2
i: 3
i: 4
5
5
5
5
5

### 解釋
  Global EC 編譯
```
	Global VO: {
		i: undefined
	}
```
  Global EC 執行
  第一個 loop i = 0
```
	Global VO: {
		i: 0
	}
```
  console.log('i: ' + i) 出來結果是 i: 0，console.log('i: ' + i) pop
  
  setTimeout() 把 console.log(i) 丟到 webapi去，然後一秒後進入 task queue 排隊，queue = 1，setTimeout() pop

  i++
```
	Global VO: {
		i: 1
	}
```
  執行第二個 loop

  console.log('i: ' + i) 出來結果是 i: 1，console.log('i: ' + i) pop
  
  setTimeout() 把 console.log(i) 丟到 webapi去，然後一秒後進入 task queue 排隊，queue = 2，setTimeout() pop

  i++
```
	Global VO: {
		i: 2
	}
```

  執行第三個 loop

  console.log('i: ' + i) 出來結果是 i: 2，console.log('i: ' + i) pop
  
  setTimeout() 把 console.log(i) 丟到 webapi去，然後一秒後進入 task queue 排隊，queue = 3，setTimeout() pop

  i++
```
	Global VO: {
		i: 3
	}
```

  執行第四個 loop

  console.log('i: ' + i) 出來結果是 i: 3，console.log('i: ' + i) pop
  
  setTimeout() 把 console.log(i) 丟到 webapi去，然後一秒後進入 task queue 排隊，queue = 4，setTimeout() pop

  i++
```
	Global VO: {
		i: 4
	}
```

  執行第五個 loop

  console.log('i: ' + i) 出來結果是 i: 4，console.log('i: ' + i) pop
  
  setTimeout() 把 console.log(i) 丟到 webapi去，然後一秒後進入 task queue 排隊，queue = 5，setTimeout() pop

  i++
```
	Global VO: {
		i: 5
	}
```

  這時候 call stack 沒有東西了，所以 Event Loop 把五個派對的 console.log(i) 依序打到 call stack 並且執行，所以就會有後面的五個 5。