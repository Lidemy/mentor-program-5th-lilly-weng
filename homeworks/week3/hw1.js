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

//LIOJ 1021
function solve(lines) {
  let n = lines[0];
  let star = "";
  for (let i = 0; i < n; i++) {
    star += "*";
    console.log(star);
  }
}
