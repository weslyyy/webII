<?php
  class Calculadora {
    private $numero1;
    private $numero2;

    public function getNumero1() {
        return $this->numero1;
    }

    public function setNumero1($numero1) {
      $this->numero1 = $numero1;
      return $this;
    }

    public function getNumero2() {
      return $this->numero2;
    }

    public function setNumero2($numero2) {
      $this->numero2 = $numero2;
      return $this;
    }

    public function toString() {
      return "
              <p>
                Número 1: ".$this->numero1.";
              </p>
              <p>
                Número 2: ".$this->numero2.";
              </p>
              ";
    }

    public function somar() {
      return $this->numero1 + $this->numero2;
    }

    public function multiplicar() {
      return $this->numero1 * $this->numero2;
    }

    public function dividir() {
      return $this->numero1 / $this->numero2;
    }

    public function calcularRaiz1() {
      return sqrt($this->numero1);
    }
  }

 ?>
