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

//LIOJ 1030
function solve(lines) {
  let str = lines[0];
  let n = str.length;

  let s = "";
  for (let i = n - 1; i >= 0; i--) {
    s += str.charAt(i);
  }
  //console.log(s);
  if (s === str) {
    console.log("True");
  } else {
    console.log("False");
  }
}
