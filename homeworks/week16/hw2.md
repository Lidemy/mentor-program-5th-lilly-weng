從這個 for 循環來看，一開始會印出 i: 1 - 4，而每一次循環的時候都會有一個 setTimeout，因此我們也可以得知，每一次循環都會有一個
`(()=>{console.log(i)})` 被放進去 webapis 裡面，而且需要等待 i \* 1000 後才會被放到 task queue 裡面。那麼問題就是，這個 setTimeout 裡面的 i 是否跟 for loop 一樣呢?

就像第一題說的，這個 `(()=>{console.log(i)})` 是放在 webApis 裡面等 i \* 1000，而 setTimeout 裡面的 i 就是跟著 for loop 走，分別就是 0, 1, 2, 3, 4，而等這些時間跑完之後，`(()=>{console.log(i)})` 就會到 task queue 再到 stack，等它們到 stack 的時候，for loop 早就結束了，因此它們只會拿到 i = 5。輸出結果如以下所示。

```
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
```
