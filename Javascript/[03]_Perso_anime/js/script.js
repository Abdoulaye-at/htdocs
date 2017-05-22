// Identification de l'élement
var chat =  document.getElementById("chat").getElementsByTagName('div')[0];
console.log(chat)

// EventListener
function run(){
  chat.className = "run";
  setTimeout(function (){
    chat.className ="walk" }, 2000);
  console.log([chat]);
}
  chat.addEventListener("click", run);

function myMove() {
  var elem = document.getElementById("chat");
  var pos = 0;
  var id = setInterval(frame, 5);
  function frame() {
    if (pos == 1300) {
      clearInterval(id);
    } else {
      pos++;
      elem.style.left = pos + 'px';
      elem.style.right = pos + 'px';
    }
  }
}
