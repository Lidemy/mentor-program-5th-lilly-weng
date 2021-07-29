JavaScript 在執行程式的時候，會把需要執行的指令放到 stack 裡面，stack 是由下往上堆疊的，然後再由上往下執行。除了 stack 之外還有兩個區域，分別是 webapis 和 task queue，當程式需要等待才能執行時，通常比較常見的就是 callback function，這些程式會先去 webapis 執行，例如下載檔案或是下載動畫之類的。在 webapis 運作的指令並不會影響到 stack，等這些指令完成之後，它們便會被移到 task queue 裡面，再由 event loop 放到 stack 裡面，在 stack 執行之後我們便能在前端看到結果。

JavaScript 過往都只能一次執行一個東西，因此如果是下載動畫之類的，可能會因此卡很久，而 event loop 的出現便可以讓下載動畫這件事在旁邊執行，等它好了再透過 event loop 放到 stack。也就是說 event loop 是讓 JavaScript 從原本的 single thread 變成 multi thread。

因此這一題的話，會先輸出 stack 裡面的東西，再輸出 task queue 裡面的東西，而 setTimeout 是屬於 webapis的種類，，等 setTimeout 執行完後，裡面的東西 ( ()=> {console.log(2)) 會被放去 queue，再被移到 stack，所以會比 stack 裡面的東西輸出還要慢。輸出的結果應該如下方所示。

```
1
3
5
2
4
```