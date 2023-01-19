
CREATE TABLE endereco
(
   id int PRIMARY KEY auto_increment,
   cep char(10),
   rua varchar(100),
   bairro varchar(50),
   cidade varchar(50),
) ENGINE=InnoDB;

INSERT INTO endereco VALUES(default,'38400-100','Av Floriano','Centro','Uberlândia');
INSERT INTO endereco VALUES(default,'38400-101','Machado de Assis','Centro','Uberlândia');