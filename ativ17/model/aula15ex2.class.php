<?php
  class Exercicio2 {
    private $nome;
    private $peso;
    private $altura;
    private $massa;

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
        return $this;
    }

    public function getPeso() {
        return $this->peso;
    }

    public function setPeso($peso) {
        $this->peso = $peso;
        return $this;
    }

    public function getAltura() {
        return $this->altura;
    }

    public function setAltura($altura) {
        $this->altura = $altura;
        return $this;
    }

    public function getMassa() {
        return $this->massa;
    }

    public function setMassa($massa) {
        $this->massa = $massa;
        return $this;
    }


    public function toString() {
      return "
      <p>
        Nome: ".$this->nome.";
      </p>
      <p>
        Peso: ".$this->peso."Kg;
      </p>
      <p>
        Altura: ".$this->altura."cm;
      </p>
      ";
    }

// (($this->altura / 100) * ($this->altura / 100))
    public function IMC() {
      $this->massa = $this->peso / pow ($this->altura, 2) / 100;
      $this->massa = number_format($this->massa, 1, '.', '');

      return $this->massa;
    }

    public function situacao() {
      if ($this->IMC() < 18.5) {
        return "Magreza";
      } elseif ($this->IMC() >= 18.5 &&  $this->IMC() <=24.9) {
        return "Normal";
      } elseif ($this->IMC() >24.9 && $this->IMC() <= 29.9) {
        return "Sobrepeso";
      } elseif ($this->IMC() >29.9 && $this->IMC() <= 39.9) {
        return "Obesidade";
      } else {
        return "Obesidade Grave";
      }
    }

  }

 ?>
