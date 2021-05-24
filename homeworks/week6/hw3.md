## 請找出三個課程裡面沒提到的 HTML 標籤並一一說明作用。

以下這三個標籤是 HTML5 新的標籤

vedio:  
可以用來放影片，屬性有 autoplay`,表示音檔會自動撥放，也有 control，表示影片需要用戶控制，還有 loop，表示影片結束後會重新播放，也有 mute，表示影片的聲音會被靜音。

audio:  
可以用來放音檔，屬性有 autoplay`,表示音檔會自動撥放，也有 control，表示音檔需要用戶控制，還有 loop，表示音頻結束後會重新播放。

meter: 可以用來顯示已知範圍的標量值，像是電池剩下多少，可以用這個標籤。
<meter min="200" max="500" value="370">

## 請問什麼是盒模型（box modal）

盒模型是被用在版面設計上的，最裡面是 content，依序往外是 padding、border、以及 margin。  
content 是事物的本體，padding 是向內調整，主要調整 border 到 content 的距離。而 margin 是向外調整，是 border 外面的距離，可以理解為 content 和 content 之間的距離。

## 請問 display: inline, block 跟 inline-block 的差別是什麼？

inline 可併排，但無法調寬高和上下邊距，而寬高會根據內容而定，而調 margin 改變的只有左右，另外 padding 對 inline 沒有的意思是，padding 不會造成其他元素位置的變動，但是會把本元素的高度撐開。

block 會自己佔滿一整列，因此每一列只能放一個元素，且調什麼屬性都可以。

inline-block 對外像 inline 可併排，對內像 block 可調各種屬性。

## 請問 position: static, relative, absolute 跟 fixed 的差別是什麼？

static: 網頁預設的排版樣子，按照順序排列。  
relative: 和原本的位置相比，也就是與 static 的位置相比，更改位置的話不會動到其他元素。  
absolute:絕對定位，針對某個參考點進行定位，而參考點就是往上找，找到的第一個不是 static 的定位，通常就是 relative。用了 absolute 後，元素就排在另外一個地方，就不是根據 static 的排版方式，而後面的元素會按照預設的排版流程排列。
fixed:
相對於 viewport 去定位，不管怎麼滑動都會在固定的地方。
