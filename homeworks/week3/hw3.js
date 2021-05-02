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

//LIOJ 1020
function solve(lines) {
  //console.log(typeof lines);
  let n = lines[0]; //length
  //console.log(lines[1]);

  for (let i = 1; i <= n; i++) {
    let notPrime = 0;
    if (Number(lines[i]) === 1) {
      console.log("Composite");
    } else if (
      Number(lines[i]) === 2 ||
      Number(lines[i]) === 3 ||
      Number(lines[i]) === 5
    ) {
      console.log("Prime");
    } else {
      for (let j = 2; j < lines[i]; j++) {
        if (Number(lines[i]) % j === 0) {
          //console.log(Number(lines[i]));
          notPrime = 1;
          break;
        }
      }
    }
    //console.log(notPrime);
    if (notPrime != 0) {
      console.log("Composite");
      notPrime = 0;
    } else if (
      notPrime === 0 &&
      Number(lines[i]) != 1 &&
      Number(lines[i]) != 2 &&
      Number(lines[i]) != 3 &&
      Number(lines[i]) != 5
    ) {
      console.log("Prime");
      notPrime = 0;
    }
  }
}
