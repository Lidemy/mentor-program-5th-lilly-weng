## 為什麼我們需要 React？可以不用嗎？

### 為什麼我們需要 React?

React 把元件的屬性都直接綁在元件上，因此我們操作元件的時候就不需要再利用 querySelector 來選到 DOM 之後，再加上 eventListener 進行操作。我們可以直接更改 state 來 render 出想要的 virtual DOM。

virtual DOM 也是 React 的一大特色，跟 real DOM 不一樣，virtual DOM 會去比較有哪些更動，再針對更動去做 render，而不用每次一有什麼更動就全部 render 一次，也因為 virtual DOM，所以 React 的 performane 會更好一點。

### 可以不用嗎?

可以不用 React，畢竟還是有很多其他的框架可以考慮，像是我們之前學的 jQuery 或是 php 這些，其他還有一些 Vue.js 或是 Angular.js 都是寫網站的框架。

## React 的思考模式跟以前的思考模式有什麼不一樣？

主要還是 state 的概念和以前很不一樣，對 react 而言，是依靠 state 去做變動、去 render，因此怎麼設定 state、怎麼改變 state 是最重要的。但是我們之前就是先把畫面 UI 弄出來之後，透過 querySelector 和 eventListener 去看要針對哪些東西區操作。

## state 跟 props 的差別在哪裡？

state 是可以在 component 中宣告，或是透過 setState 去改變。pops 是 parent component 傳給 child component 的， props 是不能改變的，如果想要改變 props，那就要回到 parent component 去改變 state，再傳到 child component 裡面。
