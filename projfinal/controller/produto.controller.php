<?php
  session_start();

include '../model/produto.class.php';
include '../dao/produto.dao.class.php';

switch ($_GET['op']) {
  case 'cadastra':
    $nome = $_POST['input-nome'];
    $descricao = $_POST['input-descricao'];
    $valor = $_POST['input-valor'];
    $quantidade = $_POST['input-quantidade'];
    $tipo = $_POST['input-tipo'];
    $erro = '';

    if (empty($nome)) {
      $erro = "Coloque pelo menos um nome para o produto";
    } else {
      $p1 = new Produto;

      $p1->nome = $nome;
      $p1->descricao = $descricao;
      $p1->valor = $valor;
      $p1->quantidade = $quantidade;
      $p1->tipo = $tipo;

      $produtoDAO = new ProdutoDAO();

      $produtoDAO->cadastrarProduto($p1);
      header('location:../view/confirmacao.cadastro.produto.html');
    }
    if (!empty($erro)) {
      $_SESSION['produtos'] = serialize($erro);
      header('location:../view/erro.php?op=produto');
    }
    break;

  case 'excluir':
    $produtoDAO = new ProdutoDAO();

    $produtoDAO->excluirProduto($_REQUEST['id_produto']);

    header('location:../view/busca.produto.php');
    break;

  case 'editar':
    $id_produto = $_GET['id_produto'];

    $query = 'WHERE id_produto = '.$id_produto;

    $produtoDAO = new ProdutoDAO();

    $produtos = $produtoDAO->buscar($query);

    $_SESSION['produtos'] = serialize($produtos);

    header('location:../view/editar.produto.php');
    break;

  case 'confirmar_edicao':

    $p1 = new Produto();

    $id_produto = $_POST['input-id_produto'];
    $nome = $_POST['input-nome'];
    $descricao = $_POST['input-descricao'];
    $valor = $_POST['input-valor'];
    $quantidade = $_POST['input-quantidade'];
    $tipo = $_POST['input-tipo'];
    $erro = '';

    if (empty($nome)) {
      $erro = "Coloque pelo menos um nome para o produto";
    } else {
      $p1->id_produto = $id_produto;
      $p1->nome = $nome;
      $p1->descricao = $descricao;
      $p1->valor = $valor;
      $p1->quantidade = $quantidade;
      $p1->tipo = $tipo;

      $produtoDAO = new ProdutoDAO();

      $produtoDAO->editarProduto($p1);

      header('location:../view/busca.produto.php');
    }
    if (!empty($erro)) {
      $_SESSION['produtos'] = serialize($erro);
      header('location:../view/erro.php?op=produto');
    }
    break;

  default:
    echo "Erro!";
    break;
}


?>
