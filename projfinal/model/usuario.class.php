<?php
  class Usuario {
    private $id_usuario;
    private $nome;
    private $cpf;
    private $email;
    private $senha;
    private $telefone;
    private $nascimento;

    public function __construct() {

    }

    public function __destruct() {

    }

    public function __set($atributo, $valor) {
      $this->$atributo = $valor;
    }

    public function __get($atributo) {
      return $this->$atributo;
    }

    public function __toString() {
      return "
             Código: ".$this->id_usuario."<br>
             Nome: ".$this->nome."<br>
             CPF: ".$this->cpf."<br>
             Email: ".$this->email."<br>
             Senha: ".$this->senha."<br>
             Telefone: ".$this->telefone."<br>
             Nascimento: ".$this->nascimento."<br>
             ";
    }
  }
 ?>
