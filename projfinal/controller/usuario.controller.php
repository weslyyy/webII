<?php
  session_start();

  include '../model/usuario.class.php';
  include '../dao/usuario.dao.class.php';
  include '../util/util.class.php';

  $u2 = new Util();

  $usuarioDAO = new UsuarioDAO();

  switch ($_GET['op']) {
    case 'cadastra':
      $nome = $_POST['input-nome'];
      $validarCpf = $_POST['input-cpf'];
      $email = $_POST['input-email'];
      $senha = $_POST['input-senha'];
      $validarTelefone = $_POST['input-telefone'];
      $nascimento = $_POST['input-nascimento'];
      $erro = '';

      if (empty($nome) || empty($validarCpf) || empty($email) || empty($senha) || empty($nascimento)) {
        $erro = "Preencha os campos necessários!";
      } else {
          $cpf = $u2->apenasNumeros($validarCpf);
          $telefone = $u2->apenasNumeros($validarTelefone);

          if (!$u2->testarExpressaoRegular('/^[A-Za-zá-ù ]{2,100}$/',$nome)
          || !$u2->testarExpressaoRegular('/^[0-9]{11}$/',$cpf)
          || !$u2->validarEmail($email)
          || $u2->contarCaracteres($senha) < 6
          || $u2->contarCaracteres($senha) > 32
          || !$u2->testarExpressaoRegular('/^[0-9]{11}$/',$telefone)) {
            $erro = "Preencha os campos corretamente!";
          } else {
            $u1 = new Usuario();

            $u1->nome = $nome;
            $u1->cpf = $cpf;
            $u1->email = $email;
            $u1->senha = $senha;
            $u1->telefone = $telefone;
            $u1->nascimento = $nascimento;

            $usuarioDAO->cadastrarUsuario($u1);

            // $nomeremetente = $_POST['input-nome'];
            // $emailremetente = 'weslydeandrademoraes@gmail.com';
            // $emaildestinatario = trim($_POST['input-email']);
            // $telefone = $_POST['input-telefone'];
            //
            // $mensagemHTML = '
            // Formulário de Usuário -
            // Cadastro: '.$nomeremetente;
            //
            // $headers = "Mensagem de Dados: \nNome: $nomeremetente \nEmail: $emailremetente\nTelefone: $telefone \n";
            // $headers .= "From: $emailremetente\r\n";
            //
            // $headers .= "Return: $emaildestinatario \r\n";
            //
            // $envio = mail($emaildestinatario, $mensagemHTML, $headers);
            //
            // if($envio)
            header('location:../view/confirmacao.cadastro.usuario.html');
        }
        if (!empty($erro)) {
          $_SESSION['usuarios'] = serialize($erro);
          header('location:../view/erro.php?op=usuario');
        }
      }
      break;

      case 'excluir':
        $usuarioDAO->excluirUsuario($_REQUEST['id_usuario']);

        header('location:../view/busca.usuario.php');
        break;

      case 'editar':
        $id_usuario = $_GET['id_usuario'];

        $query = 'WHERE id_usuario = '.$id_usuario;

        $usuarios = $usuarioDAO->buscar($query);

        $_SESSION['usuarios'] = serialize($usuarios);

        header('location:../view/editar.usuario.php');
        break;

      case 'confirmar_edicao':

        $u1 = new Usuario();

        $id_usuario = $_POST['input-id_usuario'];
        $nome = $_POST['input-nome'];
        $cpf = $_POST['input-cpf'];
        $email = $_POST['input-email'];
        $senha = $_POST['input-senha'];
        $telefone = $_POST['input-telefone'];
        $nascimento = $_POST['input-nascimento'];
        $erro = '';

        if (empty($nome) || empty($validarCpf) || empty($email) || empty($senha) || empty($nascimento)) {
          $erro = "Preencha os campos necessários!";
        } else {
          $cpf = $u2->apenasNumeros($validarCpf);
          $telefone = $u2->apenasNumeros($validarTelefone);

          if (!$u2->testarExpressaoRegular('/^[A-Za-zá-ù ]{2,100}$/',$nome)
          || !$u2->testarExpressaoRegular('/^[0-9]{11}$/',$cpf)
          || !$u2->validarEmail($email)
          || $u2->contarCaracteres($senha) < 6
          || $u2->contarCaracteres($senha) > 32
          || !$u2->testarExpressaoRegular('/^[0-9]{11}$/',$telefone)) {
            $erro = "Preencha os campos corretamente!";
          } else {
            $u1->id_usuario = $id_usuario;
            $u1->nome = $nome;
            $u1->cpf = $cpf;
            $u1->email = $email;
            $u1->senha = $senha;
            $u1->telefone = $telefone;
            $u1->nascimento = $nascimento;

            $usuarioDAO->editarUsuario($u1);

            header('location:../view/busca.usuario.php');
          }
          if (!empty($erro)) {
            $_SESSION['usuarios'] = serialize($erro);
            header('location:../view/erro.php?op=usuario');
          }
        }
        break;

    default:
      echo "<h2>Erro!</h2>";
      break;
  }
?>
