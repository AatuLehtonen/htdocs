document.addEventListener("DOMContentLoaded", function (data) {
  document.getElementById("Send").addEventListener("click", sendMessages); //Lisää nappii click ominaisuuden

  // Lähettää viestin Enteriä painaessa.
  let send = document.getElementById("Send");

  document.addEventListener("keypress", (event) => {
    let keyCode = event.keyCode ? event.keyCode : event.which;
    if (keyCode === 13) {
      send.click();
    }
  });
  fetchData("fetchMessages");

  setInterval(fetchData, 1000, "fetchMessages");
});

function fetchData(data) {
  const ajax = new XMLHttpRequest();
  Id = document.querySelector("#Id").value;
  ajax.open("POST", "http://localhost:88/ASAP/htdocs/fetchMessages.php", true);

  ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  ajax.send("user=" + Id);

  ajax.onreadystatechange = function () {
    if (ajax.readyState === XMLHttpRequest.DONE && ajax.status === 200) {
      if (data == "fetchMessages") {
        document.querySelector("#messages").innerHTML = ajax.responseText;
      }
    }
  };
}
function sendMessages() {
  data = document.querySelector("#message").value;

  document.querySelector("#message").value = "";

  const ajax = new XMLHttpRequest();

  ajax.open("POST", "http://localhost:88/ASAP/htdocs/addMessage.php", true);

  ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  ajax.send("add=" + data);

  ajax.onreadystatechange = function () {
    if (ajax.readyState === XMLHttpRequest.DONE && ajax.status === 200) {
      fetchData("fetchMessages");
    }
  };
}
