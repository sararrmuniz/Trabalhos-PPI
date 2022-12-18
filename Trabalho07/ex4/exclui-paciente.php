<?php
require "conexaoMysql.php";
$pdo = mysqlConnect();

$codigo = $_GET["codigo"] ?? "";

try {

  $sql = <<<SQL
  DELETE FROM pessoa
  WHERE codigo = ?
  SQL;

  // Neste caso utilize prepared statements para prevenir
  // ataques do tipo SQL Injection, pois a declaração
  // SQL contem um parâmetro (codigo) vindo da URL
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$codigo]);

  header("location: listar-pacientes.php");
  exit();
} 
catch (Exception $e) {  
  exit('Falha inesperada: ' . $e->getMessage());
}
