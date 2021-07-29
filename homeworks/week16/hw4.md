先把 obj2 和 hello 展開

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

const obj2 = {
    value: 2,
    hello: function() {
        console.log(this.value)
    }
}

hello = function() {
    console.log(this.value)
}
```

第一題: obj.inner.hello()，可以看成是 obj.inner.hello.call(obj.inner.value)，也就是會印出 obj.inner 的值，也就是 2。

第二題: obj2.hello()，可以看成是 obj2.hello.call(obj2.value)，也就是會印出 obj2.value 的值，也是 2。

第三題: hello()，可以看成是 hello.call(undefined))，也就是會印出 undefined。因為 this 沒有指向任何東西，因此會使用 this 的預設值，如果 runtime 沒有使用 'use strict' 的話，瀏覽器的預設值是 window object，NodeJS 的預設值的話則是 global object，而有使用 'use strict' 的話 this 的預設值就是 undefined。雖然這裡沒有使用 'use strict'，但是因為 global 裡沒有東西，所以還是 undefined。

輸出如以下所示:

```
2
2
undefined
```
