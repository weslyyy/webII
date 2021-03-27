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
  <title>Resposta Atividade 15 Exercício 1</title>
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
      <a href="../view/cadastra.aula17.html">Atividade 17</a>
    </nav>
    <header id="cabecalho">
      <h1>Resposta Atividade 15 Exercício 1</h1>
    </header>
    <section class="container" id="conteudo">
      <br>
      <?php
          include '../model/aula15ex1.class.php';

          $ex1 = new Exercicio1();

          $salario = $_GET['txtsalario'];
          $vendas = $_GET['txtvendas'];

          $ex1->setSalario($salario);
          $ex1->setVendas($vendas);

          echo "
          <p>
            1. Crie a página exercicio01.php e resolva o exercício abaixo:
            Um funcionário recebe um salário fixo mais 4% de comissão sobre as vendas.
            Faça um programa que receba o salário fixo de 5400.40, e o valor de suas
            vendas de 15000.20. Calcule e mostre a comissão e o salário final do funcionário.
          </p>
          <p>
            Exemplo de Resposta:
          </p>
          <p>
            Salário Fixo: R$ 5400.4
          </p>
          <p>
            Valor Vendas: R$ 15000.2
          </p>
          <p>
            Comissão: R$ 600.0
          </p>
          <p>
            Salário Final: R$ 6000.40
          </p>
            <strong>
              ".$ex1->toString()."
              <p>
              <p>
                Comissão: R$ ".$ex1->comissao().";
              </p>
              <p>
                Salário Final: R$ ".$ex1->total().";
              </p>
            </strong>
          ";
         ?>
    </section>
  </main>
</body>

</html>
