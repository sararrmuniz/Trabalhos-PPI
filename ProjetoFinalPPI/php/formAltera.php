<?php

session_start();

$email = $_SESSION['email'];

require "conexaoMysql.php";
$pdo = mysqlConnect();

$nome = $_POST["nome"] ?? "";
$cpf = $_POST["cpf"] ?? "";
$senha = $_POST["senha"] ?? "";
$telefone= $_POST["telefone"] ?? "";

$hashsenha = password_hash($senha, PASSWORD_DEFAULT);

try {

  $sql = <<<SQL
  -- Repare que a coluna Id foi omitida por ser auto_increment
  UPDATE anunciante 
  SET nome = ?,
  cpf = ?,
  telefone = ?,
  hash_senha = ?
  WHERE email = '$email'
  SQL;

  $stmt = $pdo->prepare($sql);
  $stmt->execute([
    $nome, $cpf, $telefone, $hashsenha
  ]);

  header("location: altera_dados.php");
  exit();
} 
catch (Exception $e) {  
  //error_log($e->getMessage(), 3, 'log.php');
  if ($e->errorInfo[1] === 1062)
    exit('Dados duplicados: ' . $e->getMessage());
  else
    exit('Falha ao cadastrar os dados: ' . $e->getMessage());
}
?>