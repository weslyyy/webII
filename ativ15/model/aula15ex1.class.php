<?php
  class Exercicio1 {
    private $salario;
    private $vendas;

    public function getSalario() {
        return $this->salario;
    }

          public function setSalario($salario) {
        $this->salario = $salario;
        return $this;
    }

          public function getVendas() {
        return $this->vendas;
    }

          public function setVendas($vendas) {
        $this->vendas = $vendas;
        return $this;
    }

    public function toString() {
      return "
      <p>
        Salário fixo: R$ ".$this->salario.";
      </p>
      <p>
        Valor das Vendas: R$ ".$this->vendas."
      </p>
      ";
    }

    public function comissao() {
      return $this->vendas * 0.04;
    }

    public function total() {
      return $this->salario + $this->comissao();
    }

  }
 ?>
