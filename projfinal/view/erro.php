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
  <title>Cadastrado Concluído</title>
</head>

<body>
  <main id="principal">
    <section id="tela_padrao">
      <?php
        switch ($_GET['op']) {
          case 'usuario':
            if(isset($_SESSION['usuarios'])){
              include_once '../model/usuario.class.php';

              $u1 = array();

              $u1 = unserialize($_SESSION['usuarios']);
              echo "<h2>".$u1."</h2>";
            }
            break;

            case 'produto':
              if (isset($_SESSION['produtos'])){
               include_once '../model/produto.class.php';

               $p1 = array();

               $p1 = unserialize($_SESSION['produtos']);
               echo "<h2>".$p1."</h2>";
             }
              break;

          default:
            echo "<h2>Erro!</h2>";
            break;
        }
      ?>
      <div>
        <a onClick="history.go(-1)">
          <button type="button" class="btn btn-primary">Voltar</button>
        </a>
        <a href="../index.html">
          <button type="button" class="btn btn-primary">Home</button>
        </a>
      </div>
    </section>
  </main>
</body>

</html>
