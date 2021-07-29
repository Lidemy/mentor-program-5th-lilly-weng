第一步: 先初始化 global EC，先看 function 再找 variable。

```
global EC: {
    vo:{
        fn: function
        a: undefined
    }
}
```

第二步: var a = 1

```
global EC: {
    vo:{
        fn: function
        a: 1
    }
}
```

第三步: 呼叫 function，然後初始化 fn

```
fn EC
fn VO:
    {
    fn2: function
    a: undefined
    }

global EC
global VO:
        {
        fn: function
        a: 1
        }

```

第四步: 執行 fn() 裡面的程式，因為 function 中的 a 是 undefined，所以第一個 console.log 會印出 undefined

第五步: a 被 assgin 5，因此第二個 console.log 會印出 5

第六步: a ++，此時 a 是 6，而下方的 var a 並不會造成什麼影響，所以可以忽略

```
fn EC
fn VO:
    {
    fn2: function
    a: 6
    }

global EC
global VO:
        {
        fn: function
        a: 1
        }

```

第七步: 進去 fun2()，沒有 arguments、也沒有 functions，也沒有 variables，所以 VO 裡面是空的，而 function 中的 console.log ，會向上找到 fn 的 a 的值，就是 6。

```
fn2 EC
fn2 VO:{

}

fn EC
fn VO:
    {
    fn2: function
    a: 6
    }

global EC
global VO:
        {
        fn: function
        a: 1
        }

```

第八步: fn2() 中 a = 20，因為 fn2() 中沒有 a，所以會上升到 fn()，fn() 的 a 會改為 20，而 b 因為 fn2() 和 fn() 都沒有，所以會上升到 global EC

```
fn2 EC
fn2 VO:{

}

fn EC
fn VO:
    {
    fn2: function,
    a: 20
    }

global EC
global VO:
        {
        fn: function,
        a: 1,
        b: 100
        }
```

第九步: 執行完 fn2() 後的 console.log(a)，會印出 20，因為 fn() 中的 a 已經改變了。fn2() 因為執行完，所以消失了。

```
fn EC
fn VO:
    {
    fn2: function,
    a: 20
    }

global EC
global VO:
        {
        fn: function,
        a: 1,
        b: 100
        }
```

第十步: fn() 也執行完消失了，因此 console.log(a)，將會印出 global 的 a 的值，也就是 1。

```
global EC
global VO:
        {
        fn: function,
        a: 1,
        b: 100
        }
```

第十一步: a = 10，global 的 a 的值改變成 10，因此倒數第二個 console.log(a) 會印出 10。而 console.log(b) 則是會印出 global 裡面的 b 的值，也就是 100。

```
global EC
global VO:
        {
        fn: function,
        a: 10,
        b: 100
        }
```

所有輸出如以下所示:

```
undefined
5
6
20
1
10
100

```
