<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="pt-br" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="author" content="Wesly De Andrade Moraes">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <script type="text/javascript" src="../js/bootstrap.js"></script>
  <link rel="stylesheet" href="../css/estilo.css">
  <script type="text/javascript" src="../js/script.js"></script>
  <script type="text/javascript" src="../js/jquery-1.2.6.pack.js"></script>
  <script type="text/javascript" src="../js/jquery.maskedinput-1.1.4.pack.js" />
  </script>
  <script type="text/javascript">
    $(document).ready(function() {
      $("#cpf").mask("999.999.999-99");
    });

    $(document).ready(function() {
      $("#telefone").mask("(99) 99999-9999");
    });
  </script>
  <title>Editar Usuário</title>
</head>

<body>
  <main id="principal">
    <section id="tela_cadastro_usuario">
      <h1>Editar Usuário</h1>
      <?php
        if (isset($_SESSION['usuarios'])) {
          include_once '../model/usuario.class.php';
          include_once '../util/util.class.php';

          $u1 = unserialize($_SESSION['usuarios']);

          $u2 = new Util();
        }
       ?>
      <form class="row g-3" action="../controller/usuario.controller.php?op=confirmar_edicao" method="post" enctype="multipart/form-data">
        <div id="usuario_capa" class="text-center" style="position: relative;">
          <div id="usuario_ativar_click" onClick="ativarClick()">
            <h4>Alterar Imagem</h4>
          </div>
          <img src="../img/avatar.png" id="usuario_placeholder">
        </div>
        <input type="file" name="input-imagem" onChange="mostrarPreview(this)" id="usuario_imagem" class="form-control">
        <div class="row g-3">
          <div class="col-md-12">
            <label class="form-label">Código do usuário (automático)</label>
            <input type="text" name="input-id_usuario" value="<?php echo $u1[0]->id_usuario ?>" class="form-control" id="exampleFormControlInput1" readonly="readonly" >
          </div>
        </div>
        <div class="row g-3">
          <div class="col-md-5">
            <label class="form-label">Nome<span class="red">*</span></label>
            <input type="text" name="input-nome" required value="<?php echo $u1[0]->nome ?>" class="form-control" placeholder="Digite seu nome completo">
          </div>
          <div class="col-md-4">
            <label class="form-label">CPF<span class="red">*</span></label>
            <input type="text" id="cpf" name="input-cpf" required value="<?php echo $u1[0]->cpf ?>" class="form-control" placeholder="Digite seu CPF:">
          </div>
          <div class="col-md-3">
            <label class="form-label">Data de nascimento<span class="red">*</label>
            <input type="date" name="input-nascimento" required value="<?php echo $u1[0]->nascimento ?>" class="form-control">
          </div>
        </div>
        <div class="row g-3">
          <div class="col-md-5">
            <label class="form-label">Email<span class="red">*</span></label>
            <input type="email" name="input-email" required value="<?php echo $u1[0]->email ?>" class="form-control" placeholder="Digite seu email">
          </div>
          <div class="col-md-4">
            <label class="form-label">Senha<span class="red">*</span></label>
            <div class="input-group">
              <input type="password" name="input-senha" required value="<?php echo $u1[0]->senha ?>" class="form-control" id="senha" placeholder="Crie uma senha para sua conta">
              <button type="button" onclick="mostrarSenha(); ativarEye();" class="btn btn-primary">
                <svg id="bi-eye-fill" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                  <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                  <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                </svg>
                <svg id="bi-eye-slash-fill" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-slash-fill" viewBox="0 0 16 16">
                  <path
                    d="M10.79 12.912l-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.027 7.027 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.088z" />
                  <path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708l-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829zm3.171 6l-12-12 .708-.708 12 12-.708.707z" />
                </svg>
                <script>
                  function ativarEye() {
                    var eye1 = document.getElementById("bi-eye-fill");
                    var eye2 = document.getElementById("bi-eye-slash-fill");
                    if (eye1.style.display === "none") {
                      eye1.style.display = "block";
                      eye2.style.display = "none";
                    } else {
                      eye1.style.display = "none";
                      eye2.style.display = "block";
                    }
                  }
                </script>
              </button>
            </div>
          </div>
          <div class="col-md-3">
            <label class="form-label">Telefone</label>
            <input type="text" name="input-telefone"  id="telefone" value="<?php echo $u2->formatarTelefone($u1[0]->telefone) ?>" class="form-control" placeholder="Digite seu telefone:">
          </div>
        </div>
        </div>
        <div class="row g-3">
          <div class="col-6">
            <button type="submit" class="btn btn-primary">Continuar</button>
          </div>
        </div>
      </form>
    </section>
  </main>
</body>

</html>
