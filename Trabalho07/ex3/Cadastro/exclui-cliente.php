<?php
require "../conexaoMysql.php";
$pdo = mysqlConnect();

$email = $_GET["email"] ?? "";

try {

  $sql = <<<SQL
  DELETE FROM cliente_cadastro
  WHERE email = ?
  SQL;

  // Neste caso utilize prepared statements para prevenir
  // ataques do tipo SQL Injection, pois a declaração
  // SQL contem um parâmetro (email) vindo da URL
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$email]);

  header("location: mostra-clientes.php");
  exit();
} 
catch (Exception $e) {  
  exit('Falha inesperada: ' . $e->getMessage());
}