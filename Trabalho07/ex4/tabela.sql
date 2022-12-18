CREATE TABLE pessoa
(
   codigo int PRIMARY KEY auto_increment,
   nome varchar(50),
   sexo varchar(14),
   email varchar(50) UNIQUE,
   telefone varchar(20),
   cep char(10),
   logradouro varchar(100),
   cidade varchar(50),
   estado varchar(50)
) ENGINE=InnoDB;

CREATE TABLE paciente
(
   peso int,
   altura int,
   tiposanguineo char(5),
   codigo_pessoa int not null,
   FOREIGN KEY (codigo_pessoa) REFERENCES pessoa(codigo) ON DELETE CASCADE
) ENGINE=InnoDB;