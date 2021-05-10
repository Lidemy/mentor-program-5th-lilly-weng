/* eslint-disable*/
// api: https://lidemy-book-store.herokuapp.com/

const request = require("request");
const process = require("process");

//list function
function listBooks() {
  request(
    `https://lidemy-book-store.herokuapp.com/books?_limit=20`,
    (err, response, body) => {
      let data;
      data = JSON.parse(body);
      for (let i = 0; i < data.length; i++) {
        console.log(`${data[i].id} ${data[i].name}`);
      }
    }
  );
}

//listBooks();

//read function
function readBooks(id) {
  request(
    `https://lidemy-book-store.herokuapp.com/books/${id}`,
    (err, response, body) => {
      let data;
      data = JSON.parse(body);
      console.log(data);
    }
  );
}
//readBooks(6);

//delete function
function deleteBooks(id) {
  request.delete(
    `https://lidemy-book-store.herokuapp.com/books/${id}`,
    (err, response, body) => {
      console.log("You have deleted the book with the id number: " + `${id}`);
    }
  );
}
//deleteBooks(6);

//create function
function createBooks(name) {
  request.post(
    {
      url: `https://lidemy-book-store.herokuapp.com/books/`,
      form: {
        name,
      },
    },
    (err, response, body) => {
      console.log("You have created a book with the name: " + `${name}`);
    }
  );
}
//createBooks("我殺的人與殺我的人");

//update function
function updateBooks(id, name) {
  request.patch(
    {
      url: `https://lidemy-book-store.herokuapp.com/books/`,
      form: {
        id,
        name,
      },
    },
    (err, response, body) => {
      console.log(
        "You have updated a book with the id number " +
          `${id}` +
          " and the name " +
          `${name}`
      );
    }
  );
}

//updateBooks(3, "我殺的人與殺我的人");

const args = process.argv;

//args[0]: 絕對路徑
//args[1]: JS 的路徑
//args[2]: 輸入的資料 1
//args[3]: 輸入的資料 2

const action = args[2];
const num = args[3];

console.log("Available commands: list, read, delete, create, update");

if (action == "list") {
  listBooks();
} else if (action == "read") {
  readBooks(num);
} else if (action == "delete") {
  deleteBooks(num);
} else if (action == "create") {
  createBooks(num);
} else if (action == "update") {
  updateBooks(num, args[4]);
}
