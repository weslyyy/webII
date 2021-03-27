<?php
  class Funcionario {
    private $nome;
    private $cpf;
    private $cargo;
    private $valorHora;
    private $quantidadeHoras;
    private $horasExtras50;
    private $horasExtras100;
    private $dependentes;
    private $tipoInsalubridade;
    private $valorTransporteMensal;
    private $valorRefeicaoDiaria;
    private $email;
    private $senha;

    public function __construct($nome, $cpf, $cargo, $valorHora, $quantidadeHoras, $horasExtras50, $horasExtras100, $dependentes, $tipoInsalubridade, $valorTransporteMensal, $valorRefeicaoDiaria, $email, $senha) {
      $this->nome = $nome;
      $this->cpf = $cpf;
      $this->cargo = $cargo;
      $this->valorHora = $valorHora;
      $this->quantidadeHoras = $quantidadeHoras;
      $this->horasExtras50 = $horasExtras50;
      $this->horasExtras100 = $horasExtras100;
      $this->dependentes = $dependentes;
      $this->tipoInsalubridade = $tipoInsalubridade;
      $this->valorTransporteMensal = $valorTransporteMensal;
      $this->valorRefeicaoDiaria = $valorRefeicaoDiaria;
      $this->email = $email;
      $this->senha = $senha;
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
      <p>
      Nome: ".$this->nome.";
      </p>
      <p>
      CPF: ".$this->cpf.";
      </p>
      <p>
      Email: ".$this->email.";
      </p>
      <p>
      Senha: ".$this->senha.";
      </p>
      <p>
      Cargo: ".$this->cargo.";
      </p>
      <p>
      Valor das horas: ".$this->valorHora.";
      </p>
      <p>
      Quantidade de horas: ".$this->quantidadeHoras.";
      </p>
      <p>
      Horas extras 50%: ".$this->horasExtras50.";
      </p>
      <p>
      Horas extras 100%: ".$this->horasExtras100.";
      </p>
      <p>
      Dependentes: ".$this->dependentes.";
      </p>
      <p>
      Tipo de insalubridade: ".$this->tipoInsalubridade.";
      </p>
      <p>
      Valor do transporte mensal: ".$this->valorTransporteMensal.";
      </p>
      <p>
      Valor da refeição: ".$this->valorRefeicaoDiaria.";
      </p>
      ";
    }

    public function calcularSalarioBruto() {
      return $this->valorHora * $this->quantidadeHoras;
    }

    public function calcularValeTransporte() {
      return $this->calcularSalarioBruto() * 0.06 > $this->valorTransporteMensal ? 0 : $this->calcularSalarioBruto() * 0.06;
    }

    public function calcularSalarioFamilia() {
      if ($this->calcularSalarioBruto() <= 1425.56 and $this->dependentes != 0) {
        return $this->dependentes * 48.62;
      } else {
        return 0;
      }
    }

    public function resultadoSalarioFamilia() {
      if ($this->calcularSalarioFamilia() == 0) {
        return "Você não tem direito a este benefício.";
      } else {
        return "R$ ".$this->calcularSalarioFamilia();
      }
    }

    public function calcularInsalubridade() {
      switch ($this->tipoInsalubridade) {
        case '1 - Sem Insalubridade':
          return 0;
          break;

        case '2 – Mínimo':
          return 1045 * 0.10;
          break;

        case '3 – Médio':
            return 1045 * 0.20;
            break;

        case '4 – Máximo':
            return 1045 * 0.40;
            break;

        default:
          return "Opção Inválida!";
          break;
      }
    }

    public function resultadoInsalubridade() {
      if ($this->calcularInsalubridade() == 0) {
        return "Sem Insalubridade.";
      } else {
        return "R$".$this->calcularInsalubridade();
      }
    }

    public function calcularInss() {
      if ($this->calcularSalarioBruto() <= 1751.81) {
        return $this->calcularSalarioBruto() * 0.08;
      } else if ($this->calcularSalarioBruto() >= 1751.82 and $this->calcularSalarioBruto() <= 2919.72) {
        return $this->calcularSalarioBruto() * 0.09;
      } else if ($this->calcularSalarioBruto() <= 2919.73 and $this->calcularSalarioBruto() >= 5839.45) {
        return $this->calcularSalarioBruto() * 0.11;
      } else {
        return $this->calcularSalarioBruto() * 0.27;
      }
    }

    public function calcularValeRefeicao() {
      return (25 * $this->valorRefeicaoDiaria) * 0.20;
    }

    public function calcularValorExtra50 () {
      return $this->valorHora * $this->horasExtras50 * ($this->valorHora * 0.150 - 0.100 + 0.50);
    }

    public function calcularValorExtra100() {
      return $this->valorHora * $this->horasExtras100 * 2;
    }

    public function calcularTotalHorasExtras() {
      return $this->calcularValorExtra50() + $this->calcularValorExtra100();
    }

    public function calcularSalarioLiquido() {
      $beneficios = $this->calcularSalarioFamilia() + $this->calcularInsalubridade() + $this->calcularTotalHorasExtras();
      $descontos = $this->calcularValeTransporte() + $this->calcularInss() + $this->calcularValeRefeicao();
      return $this->calcularSalarioBruto() + $beneficios - $descontos;
    }
  }
 ?>
