
CREATE TABLE cliente_cadastro
(
   id int PRIMARY KEY auto_increment,
   email varchar(50) UNIQUE,
   hash_senha varchar(255)
) ENGINE=InnoDB;