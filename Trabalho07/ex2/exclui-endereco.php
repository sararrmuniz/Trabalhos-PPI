<?php
require "conexaoMysql.php";
$pdo = mysqlConnect();

$id = $_GET["id"] ?? "";

try {

  $sql = <<<SQL
  DELETE FROM logradouro_entrega
  WHERE id = ?
  SQL;

  // Neste caso utilize prepared statements para prevenir
  // ataques do tipo SQL Injection, pois a declaração
  // SQL contem um parâmetro (id) vindo da URL
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$id]);

  header("location: mostra-enderecos.php");
  exit();
} 
catch (Exception $e) {  
  exit('Falha inesperada: ' . $e->getMessage());
}
