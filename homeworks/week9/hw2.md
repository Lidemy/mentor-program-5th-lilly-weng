## 資料庫欄位型態 VARCHAR 跟 TEXT 的差別是什麼

VARCHAR 必須要定義長度，而且可以有默認，且 VARCHR 的實際長度是實際長度 + 1 ，最後的字節會記錄實際使用了多大的長度。

TEXT 儲存可變長度的非 Unicode 資料，最大的長度是 2^31-1 個字符，而 TEXT 是不能有默認值得，但 TEXT 不需定義長度。

## Cookie 是什麼？在 HTTP 這一層要怎麼設定 Cookie，瀏覽器又是怎麼把 Cookie 帶去 Server 的？

Cookie 是一個小小的檔案，裡面有一些使用者的資料，讓 server 可以辨認使用者。 我們也可以用 Cookie 來記住 stateless HTTP 協議的有狀態資續，透過 set-cookie 來建立 cookie。而瀏覽器在發送 request 的時候會帶著 cookie 裡面的資訊到 server ，因此 server 就可以辨認使用者資訊。

## 我們本週實作的會員系統，你能夠想到什麼潛在的問題嗎？

資料庫裡面的密碼是真正的密碼，因此有洩漏的危險。
