<?php
  require '../persistence/conexao.banco.class.php';

  class UsuarioDAO {
    private $conexao = null;

    public function __construct() {
      $this->conexao = ConexaoBanco::getInstance();
    }

    public function __destruct() {

    }

    public function cadastrarUsuario($u1) {
      try {
        $stat = $this->conexao->prepare("INSERT INTO usuario(id_usuario,nome,cpf,email,senha,telefone,nascimento)
          VALUES(NULL,?,?,?,?,?,?)");

        $stat->bindvalue(1,$u1->nome);
        $stat->bindvalue(2,$u1->cpf);
        $stat->bindvalue(3,$u1->email);
        $stat->bindvalue(4,$u1->senha);
        $stat->bindvalue(5,$u1->telefone);
        $stat->bindvalue(6,$u1->nascimento);

        $stat->execute();
      } catch (PDOException $e) {
        echo 'Erro ao cadastrar usuário: ' .$e;
      }
    }

    public function buscarUsuarios() {
      try {
        $stat = $this->conexao->query("SELECT * FROM usuario");
        $array = array();
        $array = $stat->fetchAll(PDO::FETCH_CLASS, 'Usuario');
        $this->conexao = null;
        return $array;
      } catch (PDOException $e) {
        echo 'Erro ao buscar usuário: ' .$e;
      }
    }

    public function excluirUsuario($id_usuario) {
      try {
        $stat = $this->conexao->prepare("DELETE FROM usuario WHERE id_usuario = ?");
        $stat->bindvalue(1,$id_usuario);
        $stat->execute();
        $this->conexao = null;
      } catch (PDOException $e) {
        echo 'Erro ao excluir Usuário! '.$e;
      }

    }

    public function buscar($query) {
      try {
        $stat = $this->conexao->query("SELECT * FROM usuario ".$query);
        $array = $stat->fetchAll(PDO::FETCH_CLASS,'Usuario');
        $this->conexao = null;
        return $array;
      } catch (PDOException $e) {
        echo "Erro ao buscar usuário! ".$e;
      }

    }

    public function editarUsuario($u1) {
      try {
        $stat = $this->conexao->prepare("UPDATE usuario SET nome = ?, cpf = ?, email = ?, senha = ?, telefone = ?, nascimento = ? WHERE id_usuario = ?");

        $stat->bindvalue(1,$u1->nome);
        $stat->bindvalue(2,$u1->cpf);
        $stat->bindvalue(3,$u1->email);
        $stat->bindvalue(4,$u1->senha);
        $stat->bindvalue(5,$u1->telefone);
        $stat->bindvalue(6,$u1->nascimento);
        $stat->bindvalue(7,$u1->id_usuario);

        $stat->execute();
        $this->conexao = null;
      } catch (PDOException $e) {
        echo 'Erro ao editar usuário! '.$e;
      }

    }
  }
 ?>
