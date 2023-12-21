CREATE SCHEMA db_comics;
USE db_comics;

CREATE TABLE comics (
	id_comic INT PRIMARY KEY AUTO_INCREMENT,
    titulo_comic VARCHAR(40) NOT NULL,
    paginas INT(5) NOT NULL,
    genero VARCHAR(255) NOT NULL
);

SELECT * FROM comics;