CREATE DATABASE ProgramerDB
ON
	PRIMARY(Name = ProgramerDBPrimary,
	FILENAME = 'C:\Xamppp\htdocs\Test\ProgramerDB.mdf',
	SIZE = 10MB,
	MAXSIZE = 20MB,
	FILEGROWTH = 20%),
	(Name = ProgramerDBSecondary,
	FILENAME ='C:\Xamppp\htdocs\Test\ProgramerDB.ndf',

	SIZE = 5MB,
	MAXSIZE = 10MB,
	FILEGROWTH = 20%)
LOG ON
	(Name = ProgramerDBLog,
	FILENAME = 'C:\Xamppp\htdocs\Test\ProgramerDB.ldf',
	SIZE = 30MB,
	MAXSIZE = 50MB,
	FILEGROWTH = 20%)

CREATE TABLE book_tb
  ( id int not null,
	name char(20) not null,
	category_id varchar(30) not null,
	writer_id varchar(30) not null,
	Publication_year varchar(20) not null,
	img varchar(40) not null,
	primary key (id)
  )


  CREATE TABLE category_tb
  ( id int not null,
	name char(20) not null,
	primary key (id),
  )

  CREATE TABLE penulis_tb
  (
	id int not null,
	name char(20) not null,
	primary key (id)	  
  )

  --Insert to table book_tb
INSERT INTO book_tb VALUES (2,'Everett','R','M', 1975,'');
INSERT INTO book_tb VALUES (6,'Steven','R','M',1977,'');
INSERT INTO book_tb VALUES (7,'Wise','GWS','M',1987,'');
INSERT INTO book_tb VALUES (8,'Newston','B','F',1941,'');

--Insert to table category_tb
INSERT INTO category_tb VALUES (1,'dani');
INSERT INTO category_tb VALUES (2,'wili');

--Insert to table penulis_tb
INSERT INTO penulis_tb VALUES (5,'wiliam');
INSERT INTO penulis_tb VALUES (10,'krisi');

-- Tampilkan seluruh data dari table book
SELECT * FROM book_tb

-- Tampilkan seluruh data book, category dan penulis
SELECT * FROM book_tb, category_tb, penulis_tb

-- Tampilkan seluruh data penulis
SELECT * FROM penulis_tb

-- Tampilkan spesifik book beserta category dan penulis.
SELECT * FROM book_tb, category_tb, penulis_tb