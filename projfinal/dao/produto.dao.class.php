<?php
  require '../persistence/conexao.banco.class.php';

  class ProdutoDAO {
    private $conexao = null;

    public function __construct() {
      $this->conexao = ConexaoBanco::getInstance();
    }

    public function __destruct() {

    }

    public function cadastrarProduto($p1) {
      try {
        $stat = $this->conexao->prepare("INSERT INTO produto(id_produto,nome,descricao,valor,quantidade,tipo)
          VALUES(NULL,?,?,?,?,?)");

        $stat->bindvalue(1,$p1->nome);
        $stat->bindvalue(2,$p1->descricao);
        $stat->bindvalue(3,$p1->valor);
        $stat->bindvalue(4,$p1->quantidade);
        $stat->bindvalue(5,$p1->tipo);

        $stat->execute();
      } catch (PDOException $e) {
        echo 'Erro ao cadastrar usuário: ' .$e;
      }
    }

    public function buscarProdutos() {
      try {
        $stat = $this->conexao->query("SELECT * FROM produto");
        $array = array();
        $array = $stat->fetchAll(PDO::FETCH_CLASS, 'Produto');
        $this->conexao = null;
        return $array;
      } catch (PDOException $e) {
        echo 'Erro ao buscar produto: ' .$e;
      }
    }

    public function excluirProduto($id_produto) {
      try {
        $stat = $this->conexao->prepare("DELETE FROM produto WHERE id_produto = ?");
        $stat->bindvalue(1,$id_produto);
        $stat->execute();
        $this->conexao = null;
      } catch (PDOException $e) {
        echo 'Erro ao excluir Produto! '.$e;
      }

    }

    public function buscar($query) {
      try {
        $stat = $this->conexao->query("SELECT * FROM produto ".$query);
        $array = $stat->fetchAll(PDO::FETCH_CLASS,'Produto');
        $this->conexao = null;
        return $array;
      } catch (PDOException $e) {
        echo "Erro ao buscar produto! ".$e;
      }

    }

    public function editarProduto($p1) {
      try {
        $stat = $this->conexao->prepare("UPDATE produto SET nome = ?, descricao = ?, valor = ?, quantidade = ?, tipo = ? WHERE id_produto = ?");

        $stat->bindvalue(1,$p1->nome);
        $stat->bindvalue(2,$p1->descricao);
        $stat->bindvalue(3,$p1->valor);
        $stat->bindvalue(4,$p1->quantidade);
        $stat->bindvalue(5,$p1->tipo);
        $stat->bindvalue(6,$p1->id_produto);

        $stat->execute();
        $this->conexao = null;
      } catch (PDOException $e) {
        echo 'Erro ao alterar contato! '.$e;
      }

    }





  }
?>
