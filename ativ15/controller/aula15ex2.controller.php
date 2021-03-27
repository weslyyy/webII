<!DOCTYPE html>
<html lang="pt-br" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="author" content="weslydeandrademoraes@gmail.com">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
  integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2"
  crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
  integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
  crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
  crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../css/estilo.css">
  <title>Resposta Atividade 15 Exercício 2</title>
</head>

<body>
  <main id="principal">
    <nav id="menu">
      <a href="../index.html">Home</a>
      <a href="../view/cadastranumero.html">Atividade 14</a>

      <div id="drop">
        <button id="drop-botao">Atividade 15</button>
        <div id="drop-conteudo">
          <a href="../view/cadastra.aula15ex1.html">Exercício 1</a>
          <a href="../view/cadastra.aula15ex2.html">Exercício 2</a>
        </div>
      </div>
    </nav>
    <header id="cabecalho">
      <h1>Resposta Atividade 15 Exercício 2</h1>
    </header>
    <section class="container" id="conteudo">
      <br>
      <?php
          include '../model/aula15ex2.class.php';

          $ex2 = new Exercicio2();

          $nome = $_GET['txtnome'];
          $peso = $_GET['txtpeso'];
          $altura = $_GET['txtaltura'];

          $ex2->setNome($nome);
          $ex2->setPeso($peso);
          $ex2->setAltura($altura);

          echo "
          <p>
          2. Crie a página exercicio02.php e resolva o exercício abaixo:
            Uma pessoa possui nome, peso e altura. Desenvolva um programa que diga se a pessoa
            está no seu peso ideal, pense que para saber isso precisamos saber antes o índice
            de massa corporal de uma pessoa, calcule primeiro e depois analise se esse índice
            der um valor Entre 18,5 e 24,9 a pessoa está no peso ideal, caso contrário, não
            está no peso ideal.
          </p>
            <strong>
              ".$ex2->toString()."
              <p>
                IMC: ".$ex2->IMC().";
              </p>
              <p>
                Situação: ".$ex2->situacao().";
              </p>
            </strong>
          ";
         ?>
    </section>
  </main>
</body>

</html>
