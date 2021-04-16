## 請解釋後端與前端的差異。

以博客來網路書店舉例，當我們進入博客來的首頁，我們所看到的一切都是前端的功勞，像是熱賣的書、廣告、按鈕這些，如果我們想去看電子書，切換到電子書的頁面，這也是前端負責的事情。  
  
這時候，我們突然想找一本叫做 "紅樓夢" 的書，因此我們在搜尋格輸入 "紅樓夢" ，按下搜索，此時我們就發出了 request 給後端，後端的 Server 就趕快跟資料庫說，幫我們找有哪些版本的紅樓夢，之後再將找到的東西回傳到前端的介面，消費者才能看到。  
  
因此大致上來說前端負責瀏覽器上看到的事情，背後一些資料庫或是框架就是後端要負責的事情。

## 假設我今天去 Google 首頁搜尋框打上：JavaScript 並且按下 Enter，請說出從這一刻開始到我看到搜尋結果為止發生在背後的事情。

seven-layer OSI model --> request --> server --> database --> server --> response --> seven-layer OSI model -->  

Application layer 把request 傳給 Presentation layer，再傳給 Session layer、Transport layer、Network layer、Data Link layer 最後是 Physical layer，到這裡都還是 end user 自己電腦內的傳送，最後的 Physical layer 會把我們的 request 以機器語言的方式傳給 server，server再去處理這個 request，在這個例子是 server 會請 database 查詢 JavaScript ，等 database 回傳了找到的資料給 server 後，server 會再傳到 Physical laye，然後再照剛才的流程反向傳到 Application layer，這樣 end user就可以看到查詢的資料了。  
 
## 請列舉出 3 個「課程沒有提到」的 command line 指令並且說明功用

+ calc: 叫出 calculator，可以做運算
+ charmap: 叫出字符表，可以用來輸入奇怪的符號
+ clear: 把之前的 command line 記錄通通清光光