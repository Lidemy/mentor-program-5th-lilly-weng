function join(arr, concatStr) {
    //把list裡面的東西拿出來變成string
    let res = '';
    let n = arr.length;
    for (let i=0; i<n-1; i++){
        res = res.concat(arr[i]).concat(concatStr);
    }
    res = res.concat(arr[n-1]);
    return res;
}

function repeat(str, times) {
    let res = '';
    for (let i=1; i<=times; i++) {
        res += str
    }
    return res;
}

console.log(join(['a','b','c'], '!'));
console.log(join(['a', 1 ,'b', 2 ,'c', 3], ','));
console.log(repeat('a', 5));
console.log(repeat('yoyo', 2));
