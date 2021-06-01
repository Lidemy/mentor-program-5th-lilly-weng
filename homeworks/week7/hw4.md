## 什麼是 DOM？

### 為什麼要有 DOM?

瀏覽器就是一個編譯器，能把我們寫的程式，呈現到網頁，而 DOM 是 W3C 所提出來的瀏覽器設計規範，這樣的話大家照這個規範去設計瀏覽器，那我們寫的程式在不同的瀏覽器所呈現的效果就會大同小異。

### 沒有 DOM 和有 DOM 的差別?

如果沒有 DOM 的話，大家設計瀏覽器的方式會不同，那如果編寫網頁的話就要根據不同的網頁去寫不一樣的程式，尤其現在大家的瀏覽器都不一樣，那工程是可能需要為了不同的瀏覽器去編寫很多不一樣的程式。

### 所以什麼是 DOM?

DOM 是 Document Object Model，會把 HTML 裡面的標籤、文字、和圖片都定義成物件 (Object), 而這些物件會以樹狀方式呈現，樹裡面的每個節點就是一個物件。而節點通常分為四種:

1.  Document: 就是指我們在編寫的文件，也是 HTML 的開端寫的 document
2.  Element: 就是標籤，像是 div 或是 h1 這些
3.  Text: 被標籤包起來的字
4.  Attribute: 標籤內的相關屬性

## 事件傳遞機制的順序是什麼；什麼是冒泡，什麼又是捕獲？

如同上面所述，DOM 是以樹狀的方式出現，因此事件的傳遞，會是由上往下到 target，這個過程稱為捕獲，再由 target 往上傳遞回根結點，這則稱為冒泡。舉例來說，如果我們點擊 <td> 那這個點擊事件會由 window 往下走直到 <td> 為止，之後再由 <td> 向上回傳至 window。

## 什麼是 event delegation，為什麼我們需要它？

### 為什麼要有 event delegation?

當我們想要透過點擊觸發某些事件時，我們會加入 addEventListener，但是假設我們有 100 個按鈕，那我們需要加 100 次 addEventListener 嗎? 不需要，我們可以透過事件傳遞機制來解決這個問題，由於 DOM 是以樹狀方式呈現，那麼這些按鈕的上面都會有一個共同的節點，也就是這些按鈕節點都會冒泡到一個相同的節點，那我們透過將這個共同的節點加上 addEventListener 就可以解決這個問題，只要加一次，所有的按鈕都會因為點擊而觸發事件。

### 沒有 event delegation 和有 event delegation 的差別?

如果沒有 event delegation 的話，我們就必須要一個個的加上 addEventListener，如果有動態新增的話，我們還有考慮怎麼加到新增的元素上面，因此 event delegation 可以讓我們寫事件時較有效率，也能處理動態新增。

### 所以什麼是 event delegation?

event delegation 就是一個代理人，由這個元素來幫大家處理事件觸發。

## event.preventDefault() 跟 event.stopPropagation() 差在哪裡，可以舉個範例嗎？

這兩個概念其實是沒有關係的，event.preventDefault() 是阻止預設，而 event.stopPropagation() 與事件傳遞有關，就是阻止冒泡的過程。  
舉例來說，button 的預設就是可以點擊，但是有時候我們希望使用者能夠填完資料才能點擊，那我們可以用 event.preventDefault() 來阻止使用者點擊。

```
document.querySelector(".submit").addEventListener ('click', function(e){
    if (document.querySelector(".submit").value === "") {
        e.preventDefault();
        alert("Please input the value")
    }
})
```

而 event.stopPropagation() 則是阻止向上傳遞。

HTML -

```
 <div class="outside">
        <div class="inside">
            <input type="button" id="click" value="click">
        </div>
    </div>
```

JavaScript -

```
  <script>
        document.querySelector(".outside").addEventListener('click', function (e) {
            console.log('outside')
        })
        document.querySelector(".inside").addEventListener('click', function (e) {
            console.log('inside')
        })
        document.querySelector("#click").addEventListener('click', function
        (e) {
            console.log('click')
        })
  </script>
```

這會印出 click --> inside --> outsie ，但使用 e.stopPropagtion() 的話:

JavaScript -

```
  <script>
        document.querySelector(".outside").addEventListener('click', function (e) {
            console.log('outside')
        })
        document.querySelector(".inside").addEventListener('click', function (e) {
            console.log('inside')
        })
        document.querySelector("#click").addEventListener('click', function
        (e) {
            console.log('click')
            e.stopPropagation()
        })
  </script>
```

就只會印出 click ，就不會向上傳遞了
