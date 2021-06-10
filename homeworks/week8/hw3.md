## 什麼是 Ajax？

Ajax 是 Asychronous JavaScript and XML 的縮寫，中文也能理解為「非同步請求」。什麼是非同步呢? 非同步就像是去百貨公司的餐廳吃飯，我們會拿到一個震動的號碼牌，之後我們可以去做其他事，繼續逛街直到號碼牌震動，我們再去取餐。也就是我們送出 request 後，再得到 response 之前可以先做其他事。

## 用 Ajax 與我們用表單送出資料的差別在哪？

當我們用表單送出資料後，通常頁面會跳轉。而使用 Ajax 的話可以用 JS 來控制頁面的跳轉或者資料變化，利用非同步的特性來達到，當送出 request 以及接收 response 時不需跳轉頁面。

## JSONP 是什麼？

JSONP 是 JSON with padding。這也是一個跨網域的存取資料的方式，有些標籤不受 SOP 影響，像是 img 或是 script，我們可以透過這些標籤引入其他 domain 的 JS 來獲取資料。我們可以在 server 端做填充，然後在利用 JSONP 在 client 端獲取資料。

## 要如何存取跨網域的 API？

可以透過 JSONP，或是 XHR 以及 Fetch API 發送 request。也可以透過 header 中放訊息允許 CORS (Cross-Origin Resource Sharing) 去存取其他網域的 API。

## 為什麼我們在第四週時沒碰到跨網域的問題，這週卻碰到了？

第四週我們是在 node.js 上面執行 JavaScript，因此沒有遇到網域的問題。網域的問題主要是瀏覽器為了安全性所設置的規則，因此這週我們才遇到跨網域的問題。
