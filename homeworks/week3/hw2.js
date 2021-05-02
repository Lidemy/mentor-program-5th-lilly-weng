var readline = require("readline");

var lines = [];
var rl = readline.createInterface({
  input: process.stdin,
});

rl.on("line", function (line) {
  lines.push(line);
});

rl.on("close", function () {
  solve(lines);
});

//LIOJ 1025
function solve(lines) {
  let nums = lines[0].split(" ");
  let start = Number(nums[0]);
  //console.log(start);
  let end = Number(nums[1]);
  //console.log(end);

  for (let i = start; i <= end; i++) {
    //console.log(i);
    let ht = parseInt(Math.floor(i / 100000));
    //console.log(ht);
    let hm = parseInt(i % 100000);
    let tt = parseInt(Math.floor(hm / 10000));
    //console.log(tt);
    let tm = parseInt(hm % 10000);
    let bt = parseInt(Math.floor(tm / 1000));
    //console.log(bt);
    let bm = parseInt(tm % 1000);
    let t = parseInt(Math.floor(bm / 100));
    //console.log(t);
    let tmm = parseInt(bm % 100);
    let h = parseInt(Math.floor(tmm / 10));
    //console.log(h);
    let b = parseInt(tmm % 10);
    //console.log(b);

    if (i < 10) {
      console.log(i);
    }

    //ht
    if (ht != 0) {
      if (
        Math.pow(ht, 6) +
          Math.pow(tt, 6) +
          Math.pow(bt, 6) +
          Math.pow(t, 6) +
          Math.pow(h, 6) +
          Math.pow(b, 6) ==
        i
      ) {
        console.log(i);
      }
    }
    //tt
    else if (tt != 0) {
      if (
        Math.pow(tt, 5) +
          Math.pow(bt, 5) +
          Math.pow(t, 5) +
          Math.pow(h, 5) +
          Math.pow(b, 5) ==
        i
      ) {
        console.log(i);
      }
    }
    //bt
    else if (bt != 0) {
      if (
        Math.pow(bt, 4) + Math.pow(t, 4) + Math.pow(h, 4) + Math.pow(b, 4) ==
        i
      ) {
        console.log(i);
      }
    }
    //t
    else if (t != 0) {
      if (Math.pow(t, 3) + Math.pow(h, 3) + Math.pow(b, 3) == i) {
        console.log(i);
      }
    }
    //h
    else if (h != 0) {
      if (Math.pow(h, 2) + Math.pow(b, 2) == i) {
        console.log(i);
      }
    }
    //b
    else if (b != 0) {
      if (Math.pow(b, 2) == i) {
        console.log(i);
      }
    }
  }
}
