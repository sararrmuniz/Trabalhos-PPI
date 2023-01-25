<?php
require "conexaoMysql.php";
$pdo = mysqlConnect();

$codigo = $_GET["codigo"] ?? "";

try {

  $sql = <<<SQL
  DELETE FROM anuncio
  WHERE codigo = ?
  SQL;

  $stmt = $pdo->prepare($sql);
  $stmt->execute([$codigo]);

  header("location: mostrar_anuncios.php");
  exit();
} 
catch (Exception $e) {  
  exit('Falha inesperada: ' . $e->getMessage());
}
