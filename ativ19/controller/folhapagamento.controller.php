<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="author" content="weslydeandrademoraes@gmail.com">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/estilo.css">
    <title>Folha de Pagamento</title>
  </head>
  <body>
    <main id="principal">
      <header id="cabecalho">
      </header>
      <section id="container">
        <?php
          include '../model/funcionario.class.php';
          include '../util/util.class.php';

          $u1 = new Util();

          $nome = $_POST['txtnome'];
          $cpf = $_POST['txtcpf'];
          $cargo = $_POST['selcargo'];
          $valorHora = $_POST['txtvalorhora'];
          $quantidadeHoras = $_POST['txtquantidadehoras'];
          $horasExtras50 = $_POST['txthorasextras50'];
          $horasExtras100 = $_POST['txthorasextras100'];
          $dependentes = $_POST['numdependentes'];
          $tipoInsalubridade = $_POST['selinsalubridade'];
          $valorTransporteMensal = $_POST['txtvalortransportemensal'];
          $valorRefeicaoDiaria = $_POST['numvalorrefeicaodiaria'];
          $email = $_POST['txtemail'];
          $senha = $_POST['txtsenha'];

          $f1 = new Funcionario($nome, $cpf, $cargo, $valorHora, $quantidadeHoras, $horasExtras50, $horasExtras100, $dependentes, $tipoInsalubridade, $valorTransporteMensal, $valorRefeicaoDiaria, $email, $senha);

          $nomePadrao = $u1->converterIniciaisMaiuscula($u1->converterMinusculas($nome));

          if (empty($dependentes)) {
            $f1->dependentes = 0;

          } else {
            $f1->dependentes = $f1->dependentes;

          }

          if (empty($quantidadeHoras)) {
            $f1->quantidadeHoras = 220;

          } else {
            $f1->quantidadeHoras = $f1->quantidadeHoras;

          }


          if (empty($nome) || empty($cpf) || $cargo == "0" || empty($valorHora) ||
          empty($horasExtras50) || empty($horasExtras100) ||
          $tipoInsalubridade == "0" || empty($valorTransporteMensal) ||
          empty($valorRefeicaoDiaria) || empty($email) || empty($senha)) {
            echo "<p><span>Preencha os campos necessários!</span></p>";

          } elseif (!$u1->validarNome($nome)) {
            echo "<p><span>Preencha o nome corretamente!</span></p>";

          } elseif (!$u1->validarEmail($email)) {
            echo "<p><span>Preencha o email corretamente!</span></p>";

          } elseif (!$u1->validarSenha($senha)) {
            echo "<p><span>Sua senha deve ter mais de 6 dígitos, menos de 20 e não pode ter símbolos, preencha corretamente corretamente!</span></p>";

          } elseif (!$u1->validarExpressao('/^[0-9]{0,2}$/', $dependentes)) {
              echo "<p><span>Dependentes inválido!</span></p>";

          } elseif (!$u1->validarValores($valorTransporteMensal)) {
            echo "<p><span>Valor do transporte mensal inválido, digite apenas números e pontos (para centavos)!</span></p>";

          } elseif (!$u1->validarValores($valorRefeicaoDiaria)) {
            echo "<p><span>Valor da refeição diária inválido, digite apenas números e pontos (para centavos)!</span></p>";

          } elseif (!$u1->validarValores($valorHora)) {
            echo "<p><span>Valor de horas inválido, digite apenas números e pontos (para centavos)!</span></p>";
          } elseif (!$u1->validarValores($quantidadeHoras)) {
            echo "<p><span>Quantidade de horas inválida, digite apenas números e pontos (para minutos)!</span></p>";

          } elseif (!$u1->validarValores($horasExtras50)) {
            echo "<p><span>Valor 50% das horas extra inválido, digite apenas números e pontos (para centavos)</span></p>";

          } elseif (!$u1->validarValores($horasExtras100)) {
            echo "<p><span>Valor 100% das horas extra inválido, digite apenas números e pontos (para centavos)</span></p>";

          } else {
            echo "
            <h1 class=\"text-center\">Seus Dados</h1>
            <br>
            <table class=\"table table-bordered table-striped\">

              <thead>
                <tr>
                  <th scope=\"col\">Nome</th>
                  <th scope=\"col\">CPF</th>
                  <th scope=\"col\">Email</th>
                  <th scope=\"col\">Cargo</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>".$nomePadrao."</td>
                  <td>".$f1->cpf."</td>
                  <td>".$f1->email."</td>
                  <td>".$f1->cargo."</td>
                </tr>
              </tbody>

              <thead>
                <tr>
                  <th scope=\"col\">Tipo de Insalubridade</th>
                  <th scope=\"col\">Dependentes</th>
                  <th scope=\"col\">Sálario Bruto</th>
                  <th scope=\"col\">Vale Transporte</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>".$f1->tipoInsalubridade."</td>
                  <td>".$f1->dependentes."</td>
                  <td><span class=\"destacar\">R$ ".$f1->calcularSalarioBruto()."</span></td>
                  <td>R$ ".$f1->calcularValeTransporte()."</td>
                </tr>
              </tbody>

              <thead>
                <tr>
                  <th scope=\"col\">Sálario Família</th>
                  <th scope=\"col\">Insalubridade</th>
                  <th scope=\"col\">Desconto do INSS</th>
                  <th scope=\"col\">Vale Refeição</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>".$f1->resultadoSalarioFamilia()."</td>
                  <td>".$f1->resultadoInsalubridade()."</td>
                  <td>R$ ".$f1->calcularInss()."</td>
                  <td>R$ ".$f1->calcularValeRefeicao()."</td>
                </tr>
              </tbody>

              <thead>
                <tr>

                  <th scope=\"col\">Valor Extra 50%</th>
                  <th scope=\"col\">Valor Extra 100%</th>
                  <th scope=\"col\">Total das Horas Extra</th>
                  <th scope=\"col\">Salário Líquido</th>
                </tr>
              </thead>
              <tbody>
                <tr>

                  <td>R$ ".$f1->calcularValorExtra50()."</td>
                  <td>R$ ".$f1->calcularValorExtra100()."</td>
                  <td>R$ ".$f1->calcularTotalHorasExtras()."</td>
                  <td><span class=\"destacar\">R$ ".$f1->calcularSalarioLiquido()."</span></td>
                </tr>
              </tbody>
            </table>
            ";
          }
         ?>
      </section>
    </main>
  </body>
</html>
