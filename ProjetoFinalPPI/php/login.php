<?php

session_start();

function checkLogin($pdo, $email, $senha)
{
  $sql = <<<SQL
    SELECT hash_senha
    FROM anunciante
    WHERE email = ?
    SQL;

  try {
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);
    $row = $stmt->fetch();
    if (!$row) return false;

    return password_verify($senha, $row['hash_senha']);
  } 
  catch (Exception $e) {
    exit('Falha inesperada: ' . $e->getMessage());
  }
}

require "conexaoMysql.php";
$pdo = mysqlConnect();

$email = $_POST["email"] ?? "";
$senha = $_POST["senha"] ?? "";

if (checkLogin($pdo, $email, $senha)) {
    $_SESSION['email'] = $_POST['email'];
    header("location: area_anunciante.php");
}
else {
    header("location: ../html/login.html");
}
?>