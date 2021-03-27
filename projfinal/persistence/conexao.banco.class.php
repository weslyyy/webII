<?php
class ConexaoBanco extends PDO {
  private static $instace = null;

  public function __construct($asn, $user, $pass) {
    parent::__construct($asn, $user, $pass);
  }

  public static function getInstance() {
    if (!isset(self::$instace)) {
      try {
        self::$instace = new ConexaoBanco("mysql:dbname=bd_loren;host=localhost", "root", "");
        self::$instace->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch (PDOException $e) {
        echo 'Erro ao conectar ao banco: ' . $e;
      }
    }
    return self::$instace;
  }
}
