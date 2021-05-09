/* eslint-disable*/
const request = require("request");
const process = require("process");

const args = process.argv;
let info = args[2];

function ListCountries(name) {
  request(`https://restcountries.eu/rest/v2/name/${name}`, (err, res, body) => {
    if (err) {
      return console.log("error occurs", err);
    }
    if (!name) {
      return console.log("Please enter country name.");
    }

    let data = JSON.parse(body);
    if (data.status === 404) {
      return console.log("We cannot found any countries.");
    } else {
      for (let i = 0; i < data.length; i++) {
        console.log("===============");
        console.log("Country: " + data[i].name);
        console.log("Capital: " + data[i].capital);
        console.log("Currency: " + data[i].currencies[0].code);
        console.log("Country code: " + data[i].callingCodes);
      }
    }
  });
}

ListCountries(info);
