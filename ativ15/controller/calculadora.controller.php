<!DOCTYPE html>
<html lang="pt-br" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="author" content="weslydeandrademoraes@gmail.com">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../css/estilo.css">
  <title>Resposta Atividade 14</title>
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
          <a href="../view/cadastra.aula15ex1.html">Exercício 2</a>
        </div>
      </div>
    </nav>
    <header id="cabecalho">
      <h1>Resposta Atividade 14</h1>
    </header>
    <section class="container" id="conteudo">
      <br>
      <?php
          include '../model/calculadora.class.php';

          $c1 = new Calculadora();

          $numero1 = $_GET['txtnumero1'];
          $numero2 = $_GET['txtnumero2'];

          $c1->setNumero1($numero1);
          $c1->setNumero2($numero2);

          echo "
            <p>
              1. Desenvolva uma classe calculadora. A mesma deve possuir dois atributos:
              numero1 e numero2 (privados), os métodos assessores e os métodos: somar(), multiplicar(), dividir(), calcularRaiz1().
            *No controle da classe (dentro do container que você criou), instancie a mesma,
             insira os valores: 5 e 15 para os números e exiba os resultados em um echo,
              apresente um abaixo do outro com uma formatação CSS.
            </p>
            <strong>
              ".$c1->toString()."
              <p>
                Soma: ".$c1->somar().";
              </p>
              <p>
                multiplicação: ".$c1->multiplicar().";
              </p>
              <p>
                Divisão: ".$c1->dividir().";
              </p>
              <p>
                Raiz do primeiro número: ".$c1->calcularRaiz1().";
              </p>
            </strong>
          ";
         ?>
    </section>
  </main>
</body>

</html>
