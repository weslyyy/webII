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
  <title>Resposta Atividade 17</title>
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
      <h1>Resposta Atividade 17</h1>
    </header>
    <section class="container" id="conteudo">
      <br>
      <p>
        Vamos lá pessoal, aqueles que terminaram o trabalho da aula anterior,
        as duas atividades com form e MVC, deve criar este projeto desafio
        conforme case.
      </p>
      <p>
        Desenvolva um sistema que seja capaz de cadastrar clientes para mais
        tarde permitir que os mesmos efetuem as compras.
        Cada cliente deve ter: código, nome, data nascimento, cpf, rg, tempo de
        vínculo empregatício, e-mail e uma senha de acesso (esta senha quero que
         seja criada automaticamente ao instanciar um cliente), a senha não deve
          ser digitada pelo cliente, os demais dados sim. Seu programa deve ser
          capaz de cadastrar cliente e liberar uma carta de crédito de acordo
          com seu vínculo empregatício. Cliente com menos de dois anos de
          vínculo não possuem carta de crédito, de dois anos até 4 anos -
          possuem uma carta de crédito de 5000, acima de 4 anos até 6 anos -
          carta de crédito de 8000, acima de 6 anos - carta de crédito de 10000.
      </p>
      <p>
        Faça um programa que seja capaz de ler todos os dados do cliente (exceto
         a senha), após o cadastro do mesmo, apresente todos os dados e qual sua
          carta de crédito.
      </p>
      <?php
          include '../model/aula17.class.php';

          $a17 = new Aula17();

          $nome = $_GET['txtnome'];
          $email = $_GET['txtemail'];
          $nascimento = $_GET['txtnascimento'];
          $cpf = $_GET['txtcpf'];
          $rg = $_GET['txtrg'];
          $codigo = $_GET['txtcodigo'];
          $vinculo = $_GET['txtvinculo'];

          $a17->setNome($nome);
          $a17->setEmail($email);
          $a17->setNascimento($nascimento);
          $a17->setCpf($cpf);
          $a17->setRg($rg);
          $a17->setCodigo($codigo);
          $a17->setVinculo($vinculo);

          echo "
            <strong>
              ".$a17->toString()."
              <p>
                ".$a17->carta()."
              </p>
            </strong>
          ";
         ?>
    </section>
  </main>
</body>

</html>
