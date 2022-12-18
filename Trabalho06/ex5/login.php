<?php

$email = $_POST["email"] ?? "";
$senha = $_POST["senha"] ?? "";

function carregaString($arquivo)
{
    $arq = fopen($arquivo, "r");
    $string = fgets($arq);
    fclose($arq);
    return $string;
}

$senhaHash = carregaString("../ex4/senhaHash.txt");

$senhaFornecida = password_hash($senha, PASSWORD_DEFAULT);


if(password_verify($senha, $senhaHash)){
    header("Location: sucesso.html");
    exit();
}
    else{
    header("Location: index.html");
    exit();
    }
    