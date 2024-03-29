<?php

require "conexaoMysql.php";
$pdo = mysqlConnect();

class Endereco
{
  public $rua;
  public $bairro;
  public $cidade;

  function __construct($rua, $bairro, $cidade)
  {
    $this->rua = $rua;
    $this->bairro = $bairro; 
    $this->cidade = $cidade;
  }
}

$cep = $_GET['cep'] ?? '';

try {

  $sql = <<<SQL
  -- Repare que a coluna Id foi omitida por ser auto_increment
  SELECT * FROM endereco
  WHERE cep = ?
  SQL;

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$cep]);
    $row = $stmt->fetch();

    $rua = $row["rua"];
    $bairro = $row["bairro"];
    $cidade = $row["cidade"];
    
    if ($rua == null)
    $endereco = new Endereco('', '', '');
    else
    $endereco = new Endereco($rua,$bairro,$cidade);
  
  } 
  catch (Exception $e) {
    //error_log($e->getMessage(), 3, 'log.php');
    exit('Falha inesperada: ' . $e->getMessage());
  }

  header('Content-type: application/json');  
  echo json_encode($endereco);

?>
