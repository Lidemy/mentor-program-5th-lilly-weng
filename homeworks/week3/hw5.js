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

function solve(lines) {
  //console.log(lines);
  let n = lines[0]; //長度
  //console.log(n);
  for (let i = 1; i <= n; i++) {
    let l = lines[i].split(" ");
    //console.log(typeof l[0]);
    let a = BigInt(l[0]);
    //console.log(typeof a);
    let b = BigInt(l[1]);
    let g = l[2];
    //console.log(l[2]);
    //平手
    //console.log(a, b);
    if (a === b) {
      console.log("DRAW");
      //console.log(a);
    } else {
      //比大
      //console.log(g);
      if (Number(g) === 1) {
        if (a > b) {
          console.log("A");
        } else {
          console.log("B");
        }
      }
      //比小
      if (Number(g) === -1) {
        if (a > b) {
          console.log("B");
        } else {
          console.log("A");
        }
      }
    }
  }
}
