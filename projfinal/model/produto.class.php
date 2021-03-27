<?php
  class Produto {
    private $id_produto;
    private $nome;
    private $descricao;
    private $valor;
    private $quantidade;
    private $tipo;

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
             Código: ".$this->id_produto."<br>
             Nome: ".$this->nome."<br>
             Descrição: ".$this->descricao."<br>
             Valor: ".$this->valor."<br>
             Quantidade: ".$this->quantidade."<br>
             Tipo: ".$this->tipo."<br>
             ";
    }
}

 ?>
