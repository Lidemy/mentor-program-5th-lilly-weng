/* eslint-disable */

let questions = document.querySelectorAll(".questions");
//let answers = document.querySelectorAll(".answers");

for (let i = 0; i < questions.length; i++) {
  questions[i].addEventListener("click", function () {
    let answers = document.querySelectorAll(".answers");
    if (answers[i].style.display === "block") {
      answers[i].style.display = "none";
    } else {
      answers[i].style.display = "block";
    }
    //answers[i].style.display = "block";
  });
}
