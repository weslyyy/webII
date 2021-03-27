// Deslizar menu.
var desce = window.pageYOffset;
window.onscroll = function descerMenu() {
  var sobe = window.pageYOffset;
  if (desce > sobe) {
    document.getElementById("menu").style.top = "0";
  } else {
    document.getElementById("menu").style.top = "-60px";
  }
  desce = sobe;
}


//Abrir e fechar aba de categorias.
function abrirCategorias() {
  document.getElementById("categorias").style.width = "250px";
}
function fecharCategorias() {
  document.getElementById("categorias").style.width = "0";
}


//Mostrar senha
function mostrarSenha() {
  var senha = document.getElementById("senha");
  if (senha.type === "password") {
    senha.type = "text";
  } else {
    senha.type = "password";
  }
}


//Preview de imagens.
function ativarClick(preview) {
  document.querySelector('#usuario_imagem, #produto_imagem').click();
}
function mostrarPreview(preview) {
  if (preview.files[0]) {
    var reader = new FileReader();
    reader.onload = function(preview){
      document.querySelector('#usuario_placeholder, #produto_placeholder').setAttribute('src', preview.target.result);
    }
    reader.readAsDataURL(preview.files[0]);
  }
}
