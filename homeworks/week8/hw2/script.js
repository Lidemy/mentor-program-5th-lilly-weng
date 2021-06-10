/* eslint-disable */
const request = new XMLHttpRequest();
//call API (true --> 非同步呼叫)
request.open("GET", "https://api.twitch.tv/kraken/games/top?limit=5", true);

//according to document, we need to set up header
request.setRequestHeader("Client-ID", "v0whm0qvxik2g61df5n1czn99s24f2");
request.setRequestHeader("Accept", "application/vnd.twitchtv.v5+json");

request.onload = function () {
  if (this.status >= 200 && this.status < 400) {
    //console.log(this.response);
    //JSON.parse: string --> JSON
    const games = JSON.parse(this.response).top;
    //console.log(games);
    //動態新增將遊戲放到介面上
    for (let game of games) {
      let element = document.createElement("li");
      element.innerText = game.game.name; //遊戲頻道的名稱
      document.querySelector(".navbar__nav").appendChild(element);
    }
    //顯示第一個遊戲的實況
    document.querySelector("h1").innerText = games[0].game.name;
    //抓取第一個遊戲的實況內容
    //每一次發 request 都要 new 一個新的 request
    const request2 = new XMLHttpRequest();
    //encodeURICompoenet 避免因名稱崩壞
    request2.open(
      "GET",
      "https://api.twitch.tv/kraken/streams?game=" +
        encodeURIComponent(games[0].game.name),
      true
    );
    request2.setRequestHeader("Client-ID", "v0whm0qvxik2g61df5n1czn99s24f2");
    request2.setRequestHeader("Accept", "application/vnd.twitchtv.v5+json");
    request2.onload = function () {
      if (this.status >= 200 && this.status < 400) {
        const data = JSON.parse(this.response).streams;
        //console.log(data);
        for (let stream of data) {
          let element = document.createElement("div");
          document.querySelector(".streams").appendChild(element);
          element.outerHTML = `<div class = "stream">
            <img src=${stream.preview.large}/>
            <div class="stream__avatar">
                <img src="${stream.channel.logo}">
            </div>
            <div class="stream__intro">
                <div class="stream__title"> ${stream.channel.status}</div>
                <div class="stream__channel"> ${stream.channel.display_name} </div>
            </div>          
            `;
        }
      }
    };

    request2.send();
  }
};

request.send();

//抓到 li 去更改名稱
document.querySelector(".navbar__nav").addEventListener("click", (e) => {
  if (e.target.tagName.toLowerCase() === "li") {
    const gameName = e.target.innerText;
    document.querySelector("h1").innerText = gameName;
    //重新抓一次內容
    //清空，設成空的
    document.querySelector(".streams").innerHTML = "";
    //抓取遊戲的實況內容

    const request2 = new XMLHttpRequest();
    request2.open(
      "GET",
      "https://api.twitch.tv/kraken/streams?game=" +
        encodeURIComponent(gameName),
      true
    );
    request2.setRequestHeader("Client-ID", "v0whm0qvxik2g61df5n1czn99s24f2");
    request2.setRequestHeader("Accept", "application/vnd.twitchtv.v5+json");
    request2.onload = function () {
      if (this.status >= 200 && this.status < 400) {
        const data = JSON.parse(this.response).streams;
        //console.log(data);
        for (let stream of data) {
          let element = document.createElement("div");
          document.querySelector(".streams").appendChild(element);
          element.outerHTML = `<div class = "stream">
            <img src=${stream.preview.large}/>
            <div class="stream__avatar">
                <img src="${stream.channel.logo}">
            </div>
            <div class="stream__intro">
                <div class="stream__title"> ${stream.channel.status}</div>
                <div class="stream__channel"> ${stream.channel.display_name} </div>
            </div>          
            `;
        }
      }
    };
    request2.send();
  }
});
