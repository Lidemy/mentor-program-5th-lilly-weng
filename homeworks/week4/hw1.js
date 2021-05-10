/* eslint-disable*/
// api: https://lidemy-book-store.herokuapp.com/
const request = require("request");

request(
  "https://lidemy-book-store.herokuapp.com/books?_limit=10",
  function (error, response, body) {
    let data;
    data = JSON.parse(body);

    for (let i = 0; i < data.length; i++) {
      console.log(`${data[i].id} ${data[i].name}`);
    }
  }
);
