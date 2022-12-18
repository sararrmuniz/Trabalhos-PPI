
CREATE TABLE logradouro_entrega
(
   id int PRIMARY KEY auto_increment,
   cep char(10),
   logradouro varchar(100),
   bairro varchar(50),
   cidade varchar(50),
   estado varchar(50)
) ENGINE=InnoDB;
