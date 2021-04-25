function capitalize(str) {
    console.log(str.charAt(0).toUpperCase()+str.slice(1)) ;
    //把第一個字母轉為大寫
    //透過 slice 加上從 index 1 開始的字
}

capitalize('nick');
capitalize('hello');
capitalize(',hello');
capitalize('kitty');
