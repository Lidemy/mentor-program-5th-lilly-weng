function reverse(str) {
  //讓位子第一個的字變成最後一個，依序
  //用 concat 的方法，從最後一個字往前加
  let res = '';
  let n = str.length;
  for (let i = n; i >= 0; i--) {
      res = res.concat(str.charAt(i));
  }
  console.log(res);
}

reverse('hello');
reverse('yoyoyo');
reverse('1abc2');
