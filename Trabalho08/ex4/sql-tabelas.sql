
CREATE TABLE endereco
(
   id int PRIMARY KEY auto_increment,
   cep char(10),
   rua varchar(100),
   bairro varchar(50),
   cidade varchar(50),
) ENGINE=InnoDB;

