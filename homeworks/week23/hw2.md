## 為什麼我們需要 Redux？

Redux 是幫助我們管理 state 的一個工具，如果做的 application 並不是很複雜的話，其實並不需要，但是如果是很大的工程，到處都有 state 的話，redux 就是一個很好的幫手。Redux 會把所有的 state 放在一個 store 裡面，讓我們可以集中管理，當我們需要更改 state 的話，可以更改後透過 redux 幫我們在各地的 state 一同做更改，如果有 bug 的話也能比較好找。簡而言之，當我們有很多 state 需要管理的時候，就是需要 Redux 的時候。

## Redux 是什麼？可以簡介一下 Redux 的各個元件跟資料流嗎？

Redux 是一個可以管理 state 的 Library。

**Redux 的基本元件**

1. store: 如同前面提及，這是統一管理 state 的地方，也因此一個專案只有一個 store
2. action: 如果想改變 state，只能透過 dispatch 的方式來傳送 action 給 reducer，所以也可以想成 action 是 state 唯一的資訊來源
   。
3. reducer: 接收 action 的指令來改變相對應的 state。

**Redux 的資料流**
Redux 的資料流是單向資料流，將 action 透過 dispatch 的方式傳給 reducer 後，reducer 再把新的 state 儲存到 store。

## 該怎麼把 React 跟 Redux 串起來？

需要先安裝 redux 套件，之後在專案裡面建立一個 store，之後建立 reducer，再建立 actions。之後我們可以透過再 index.js 中用 Provider 包住整個 App，然後再需要改變 state 的地方引入 useDispatch 及 action，之後就可以用 dispatch(action()) 來改變 state。
