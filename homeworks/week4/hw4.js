/* eslint-disable*/
//clientID: v0whm0qvxik2g61df5n1czn99s24f2
//application/vnd.twitchtv.v5+json
const request = require("request");

request(
  `https://api.twitch.tv/kraken/games/top`,
  {
    headers: {
      "Client-ID": "v0whm0qvxik2g61df5n1czn99s24f2",
      Accept: "application/vnd.twitchtv.v5+json",
    },
  },
  function (err, res, body) {
    if (err) {
      return console.log(err);
    }

    const data = JSON.parse(body);
    //console.log(data.top[0].viewers);
    //console.log(data.top[0].game.name);
    // console.log(data.top.length);
    for (let i = 0; i < data.top.length; i++) {
      console.log(data.top[i].viewers + " " + data.top[i].game.name);
    }
  }
);
