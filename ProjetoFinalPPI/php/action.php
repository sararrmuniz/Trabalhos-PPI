<?php

require "conexaoMysql.php";
$pdo = mysqlConnect();

$nome = $_POST["nome"] ?? "";
$cpf = $_POST["cpf"] ?? "";
$email = $_POST["email"] ?? "";
$senha = $_POST["senha"] ?? "";
$telefone = $_POST["telefone"] ?? "";

$hashsenha = password_hash($senha, PASSWORD_DEFAULT);

try {

  $sql = <<<SQL
  
  INSERT INTO anunciante (nome, cpf, email, hash_senha, telefone)
  VALUES (?, ?, ?, ?, ?)
  SQL;

  $stmt = $pdo->prepare($sql);
  $stmt->execute([
    $nome, $cpf, $email, $hashsenha, $telefone
  ]);

  header("location: ../html/sucessoCadastro.html");
  exit();
} 
catch (Exception $e) {  
  if ($e->errorInfo[1] === 1062)
    exit('Dados duplicados: ' . $e->getMessage());
  else
    exit('Falha ao cadastrar os dados: ' . $e->getMessage());
}
?>