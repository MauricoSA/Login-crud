create database gastos;
	use gastos;
create table usuario(id_usuario int auto_increment,
					nombre varchar(255),
					A_paterno varchar(255),
					A_materno varchar(255),
					email varchar(255),
					usuario varchar(255),
					password varchar(255),
					primary key(id_usuario)
					);
create table gasto(id_gasto int auto_increment,
					consep_gasto varchar(255),
					can_gasto varchar(255),
					fecha date,
					id_usuario int ,
					primary key(id_gasto),
					foreign key(id_usuario) references usuario(id_usuario) 
					);