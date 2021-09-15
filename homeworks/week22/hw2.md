## 請列出 React 內建的所有 hook，並大概講解功能是什麼

### useState

function Component 可以透過 useState 去定義 state 和 set state

### useEffect

主要是用來處理 side effect，像是連 API 就可以透過 useEffect 去 fetch 資料。

### useContext

可以用來避免 props drilling，就是避免 props 一直傳一直傳。當我們使用 context.provider 把 component 包住後，裡面的 child component 可以用 useContext 把 props 拿出來。

### useReducer

跟 useSate 有點像，都是一個陣列，第二個變數可以改變第一個變數，只是改變的方式是用 reducer function。

### useCallback

每次 re-render 的時候，components 會被重新分配到記憶體，但是有些功能不需要重新分配，就可以利用 useCallback 包起來，這樣就可以避免重新分配，可以節省效能。

### useRef

這個 hook 可以讓我們抓到 Dom 上面的資料，而且 ref 改變的時候不會 re-render。

## 請列出 class component 的所有 lifecycle 的 method，並大概解釋觸發的時機點

主要分為 Mounting、Updating、和 Unmounting。

### Mounting

1. constructor - 初始化
2. static getDerivedStateFromProps - 在 render 之前，component 要回傳一個 Object 來更新 State 或是回傳 null 表示 state 不需要更新。
3. render - render 被呼叫後會檢查 this.props 和 this.state 的變化，然後根據這些變化渲染畫面。
4. componentDidMount - Component 已經被 mount 了，可以在這個步驟 fetch 資料。

### Updating

1. static getDerivedStateFromProps
2. souldComponentUpdate - react 的預設行為是，每次 state 有變化就重新 render，因此 shouldComponentUpdate 的用處就是讓 react 知道這個 component 的 output 並不會被目前的 state 或 pop 內的改變所影響，這個方法是為了效能最佳化。
3. render
4. getSnapshotBeforeUpdate
5. componentDidUpdate - 和 componentDidMount 一樣。

### Unmounting

當 component 被從 DOM 中移除時，會呼叫這個方法

1. componentWillUnmount - 當一個 component 被 unmount 和 destroy 後會被呼叫，可以在這個方法內進行清理，像是清理計時器之類的。

## 請問 class component 與 function component 的差別是什麼？

### class component

class component 主要是透過 extend class 來建立 component，然後在 constructor 裡面定義 state 和 props，需要使用的時候要用 this 來指向 component，最後用 render 來顯示畫面。另外 class component 還有很重要的 lifecycle method 來決定 render 前後需要做的事。

### function component

透過傳入 props 的 function 來建立 component，在 version 16.8 之前，通常是用來做一些不需要 state 或是 render 的 component。但是在 16.8 出現 hook 之後，可以開始透過 useState 來使用 state，還有其他的 hooks 可以做更多事，最後可以用整個 function return 的值來決定要顯示的內容。

## uncontrolled 跟 controlled component 差在哪邊？要用的時候通常都是如何使用？

### uncontrolled component

不受 react 控制的 component，如果要使用的話，可以用 ref 的方式拿到 DOM 上的值。

### controlled component

受 react 控制的 component，component 都會有 state 的值，可以利用 setState 來改變 state。基本上都可以用 controlled component，因為 react 就是跟 state 緊密相關的框架，或是說我們可以把會改變的東西都用 state 存起來，這樣就可以確保改變資料，畫面就改變。
