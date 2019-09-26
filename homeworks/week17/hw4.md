## 題目：請說明以下程式碼會輸出什麼，以及盡可能詳細地解釋原因。

```
	const obj = {
  		value: 1,
  		hello: function() {
    		console.log(this.value)
  		},
  		inner: {
    		value: 2,
    		hello: function() {
      			console.log(this.value)
    		}
  		}
	}
	
	const obj2 = obj.inner
	const hello = obj.inner.hello
	obj.inner.hello() // ??
	obj2.hello() // ??
	hello() // ??
```

## 解答
```
obj.inner.hello();
```
這個的答案是 2。
因為可以視為 obj.inner.hello.call(obj.inner)，所以 this 就是 obj.inner，裡面的 value 就是 2。

```
obj2.hello();
```
這個答案也是 2。
因為 obj2 = obj.inner，所以 obj2 可以視為一個新的 object：
```
const obj2 = {
    value: 2,
    hello: function() {
      console.log(this.value)
    }
}
```

所以 obj2.hello() 可以看成 obj2.hello.call(obj2)，this 就是 obj2，而 obj2.value = 2。

```
hello();
```
在嚴格模式下這個答案會是 undefined。因為這樣就等於
```
function hello() {
	console.log(this);
}
hello();
```