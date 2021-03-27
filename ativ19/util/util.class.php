<?php
  class Util {

    public static function validarEmail($email) {
      return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public static function validarExpressao($expressao, $variavel) {
      return preg_match($expressao, $variavel);
    }

    public static function validarNome($valor): bool {
        $expressao = "/^[a-zA-Zá-ùÁ-Ù ]{2,30}$/";
        return preg_match($expressao, $valor);
    }

    public static function converterMinusculas($variavel) {
      return strtolower($variavel);
    }

    public static function converterIniciaisMaiuscula($variavel) {
      return ucwords($variavel);
    }

    public static function validarSenha($variavel) {
      $expressao = '/^[a-zA-Z0-9]{6,20}$/';
      return preg_match($expressao, $variavel);
    }

    public static function validarValores($variavel) {
      $expressao = '/^[0-9.]{0,10}$/';
      return preg_match($expressao, $variavel);
    }

    public static function converterMaiusculas($variavel) {
      return strtoupper($variavel);
    }

    public static function retirarEspacos($variavel) {
      return trim($variavel);
    }

    public static function contarCaracteres($variavel) {
      return strlen($variavel);
    }
    
  }
 ?>
