/* eslint-disable */
document.querySelector("#submit").addEventListener("click", function (e) {
  let validRegex =
    /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
  let phoneno = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
  e.preventDefault();
  if (document.querySelector("#name").value === "") {
    if (!document.getElementById("alert_name")) {
      e.preventDefault();
      const div = document.createElement("div");
      div.setAttribute("id", "alert_name");
      div.classList.add("row");
      div.innerHTML = `請填寫暱稱`;
      document.querySelector(".name>.alarm").appendChild(div);
    }
  } else if (document.querySelector("#email").value === "") {
    if (!document.getElementById("alert_email")) {
      e.preventDefault();
      const div = document.createElement("div");
      div.setAttribute("id", "alert_email");
      div.classList.add("row");
      div.innerHTML = `請填寫電子郵件`;
      document.querySelector(".email>.alarm").appendChild(div);
    }
  } else if (!document.querySelector("#email").value.match(validRegex)) {
    alert("請按照電子郵件格式輸入");
  } else if (document.querySelector("#phone").value === "") {
    if (!document.getElementById("alert_phone")) {
      e.preventDefault();
      const div = document.createElement("div");
      div.setAttribute("id", "alert_phone");
      div.classList.add("row");
      div.innerHTML = `請填寫手機號碼`;
      document.querySelector(".phone>.alarm").appendChild(div);
    }
  } else if (!document.querySelector("#phone").value.match(phoneno)) {
    alert("請按照手機號碼格式輸入");
  } else if (
    !document.querySelector("#bed").checked &&
    !document.querySelector("#floor").checked
  ) {
    if (!document.getElementById("alert_type")) {
      e.preventDefault();
      const div = document.createElement("div");
      div.setAttribute("id", "alert_type");
      div.classList.add("row");
      div.innerHTML = `請勾選報名類型`;
      document.querySelector(".type>.alarm").appendChild(div);
    }
  } else if (document.querySelector("#channel").value === "") {
    if (!document.getElementById("alert_channel")) {
      e.preventDefault();
      const div = document.createElement("div");
      div.setAttribute("id", "alert_channel");
      div.classList.add("row");
      div.innerHTML = `請填寫如何得知活動消息`;
      document.querySelector(".channel>.alarm").appendChild(div);
    }
  } else {
    if (document.querySelector("#bed").checked) {
      alert(
        "暱稱:  " +
          document.querySelector("#name").value +
          "\n" +
          "電子郵件:  " +
          document.querySelector("#email").value +
          "\n" +
          "手機號碼:  " +
          document.querySelector("#phone").value +
          "\n" +
          "報名類型:  " +
          document.querySelector("#bed").value +
          "\n" +
          "消息來源:  " +
          document.querySelector("#channel").value +
          "\n"
      );
    } else {
      alert(
        "暱稱:  " +
          document.querySelector("#name").value +
          "\n" +
          "電子郵件:  " +
          document.querySelector("#email").value +
          "\n" +
          "手機號碼:  " +
          document.querySelector("#phone").value +
          "\n" +
          "報名類型:  " +
          document.querySelector("#floor").value +
          "\n" +
          "消息來源:  " +
          document.querySelector("#channel").value +
          "\n"
      );
    }
  }
});
