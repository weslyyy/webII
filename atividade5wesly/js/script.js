var desce = window.pageYOffset;
window.onscroll = function menuScrool() {
  var sobe = window.pageYOffset;
  if (desce > sobe) {
    document.getElementById("menu").style.top = "0";
  } else {
    document.getElementById("menu").style.top = "-60px";
  }
  desce = sobe;
}
