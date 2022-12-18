<?php

class Endereco
{
  public $cep;
  public $logradouro;
  public $bairro;
  public $cidade;
  public $estado;

  function __construct($cep, $logradouro, $bairro, $cidade, $estado)
  {
    $this->cep = $cep;
    $this->logradouro = $logradouro;
    $this->bairro = $bairro;
    $this->cidade = $cidade;
    $this->estado = $estado;
  }

  public function AddToFile($arquivo)
  {
    // abre o arquivo para escrita de conteúdo no final
    $arq = fopen($arquivo, "a");
    fwrite($arq, "\n{$this->cep};{$this->logradouro};{$this->bairro};{$this->cidade};{$this->estado}");
    fclose($arq); 
  }
}

function carregaEnderecosDeArquivo()
{
  $arrayEnderecos = null;
  
  // Abre o arquivo enderecos.txt para leitura
  $arq = fopen("enderecos.txt", "r");
  if ( !$arq )
    return null;

  // Le os dados do arquivo, linha por linha, e armazena no vetor $Enderecos
  while (!feof($arq)) {
    // fgets lê uma linha de texto do arquivo
    $endereco = fgets($arq); 
    
    // Separa dados na linha utilizando o ';' como separador
    list($cep, $logradouro, $bairro, $cidade, $estado) = array_pad(explode(';', $endereco), 5, null);

    // Cria novo objeto representado o Endereco e adiciona no final do array
    $novoEndereco = new Endereco($cep, $logradouro, $bairro, $cidade, $estado);
    $arrayEnderecos[] = $novoEndereco;
  }
      
  // Fecha o arquivo
  fclose($arq);  
  return $arrayEnderecos;
}

?>