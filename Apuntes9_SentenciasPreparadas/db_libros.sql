CREATE SCHEMA db_libros;
USE db_libros;

CREATE TABLE libros (
	titulo VARCHAR(200) PRIMARY KEY,
    paginas INT NOT NULL,
    autor VARCHAR(60) NOT NULL
);
select * from libros;