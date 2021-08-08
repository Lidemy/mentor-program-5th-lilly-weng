JavaScript 在執行程式的時候，會把需要執行的指令放到 call stack 裡面，call stack 是由下往上堆疊的，然後再由上往下執行。在瀏覽器中的 JavaScript，除了 call stack 之外還有兩個區域，分別是 webapis 和 task queue，當程式需要等待才能執行時，通常比較常見的就是 callback function，這些程式會先去 webapis 執行，例如下載檔案或是下載動畫之類的。在 webapis 運作的指令並不會影響到 call stack，等這些指令完成之後，它們便會被移到 task queue 裡面，再由 event loop 放到 call stack 裡面，在 call stack 執行之後我們便能在前端看到結果。

JavaScript 只能一次執行一個東西，因此如果是下載動畫之類的，可能會因此卡很久，而 event loop 的出現便可以讓下載動畫這件事在旁邊執行，等它好了再透過 event loop 放到 call stack。也就是說 event loop 是讓 single thread 的 JavaScript 達到 multi thread 的效果，。

因此這一題的話，會先輸出 call stack 裡面的東西，再輸出 task queue 裡面的東西，而 setTimeout 是屬於 webapis 的種類，，等 setTimeout 執行完後，裡面的東西 ( ()=> {console.log(2)) 會被放去 queue，再被移到 call stack，所以會比 call stack 裡面的東西輸出還要慢。輸出的結果應該如下方所示。

```
1
3
5
2
4
```
