<?php
  class Aula17 {
    private $codigo;
    private $nome;
    private $nascimento;
    private $cpf;
    private $rg;
    private $vinculo;
    private $email;
    private $senha;

    public function getCodigo() {
        return $this->codigo;
    }

    public function setCodigo($codigo) {
        $this->codigo = $codigo;
        return $this;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
        return $this;
    }

    public function getNascimento() {
        return $this->nascimento;
    }

    public function setNascimento($nascimento) {
        $this->nascimento = $nascimento;
        return $this;
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function setCpf($cpf) {
        $this->cpf = $cpf;
        return $this;
    }

    public function getRg() {
        return $this->rg;
    }

    public function setRg($rg) {
        $this->rg = $rg;
        return $this;
    }

    public function getVinculo() {
        return $this->vinculo;
    }

    public function setVinculo($vinculo) {
        $this->vinculo = $vinculo;
        return $this;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
        return $this;
    }

    public function formatoData() {
      return date('d/m/Y', strtotime($this->nascimento));
    }

    public function gerarSenha() {
      $this->senha = rand(10000000, 999999999);
      return $this->senha;
    }

    public function toString() {
      return "
      <p>
        Nome: ".$this->nome.";
      </p>
      <p>
        Data de nascimento: ".$this->formatoData().";
      </p>
      <p>
        e-mail: ".$this->email.";
      </p>
      <p>
        Senha de acesso: ".$this->gerarSenha().";
      </p>
      <p>
        CPF: ".$this->cpf.";
      </p>
      <p>
        RG: ".$this->rg.";
      </p>
      <p>
        C??digo: ".$this->codigo.";
      </p>
      <p>
        Tempo de v??nculo empregat??cio: ".$this->vinculo." anos;
      </p>
      ";
    }

    public function carta() {
      if ($this->vinculo < 2) {
        return "Voc?? n??o possu?? carta de cr??dito.";
      } elseif ($this->vinculo >= 2 && $this->vinculo <= 4) {
        return "Voc?? possu?? R$5000 de cr??dito";
      } elseif ($this->vinculo > 4 && $this->vinculo <= 6) {
        return "Voc?? possu?? R$8000 de cr??dito";
      } else {
        return "Voc?? possu?? R$10000 de cr??dito";
      }
    }

  }
 ?>
