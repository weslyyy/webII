<?php
  class Util {
    public function validarEmail($email) {
  		return filter_var($email, FILTER_VALIDATE_EMAIL);
  	}

    public function testarExpressaoRegular($expressao, $atributo) {
  		return preg_match($expressao,$atributo);
  	}

    function apenasNumeros($atributo) {
      return preg_replace('/[^0-9]/', '', $atributo );
  }

  public function contarCaracteres($variavel) {
		return strlen($variavel);
	}

  public function formatarCpf($formtaCpf) {
    $f1 = substr($formtaCpf, 0, 3);
    $f2 = substr($formtaCpf, 3, 3);
    $f3 = substr($formtaCpf, 6, 3);
    $f4 = substr($formtaCpf, 9, 2);

    return $cpf = "$f1.$f2.$f3-$f4";
  }

  public function formatarTelefone($formtaTelefone) {
    $f1 = substr($formtaTelefone, 0, 2);
    $f2 = substr($formtaTelefone, 2, 5);
    $f3 = substr($formtaTelefone, 7, 4);

    return $telefone = "($f1) $f2-$f3";
  }

}
 ?>
