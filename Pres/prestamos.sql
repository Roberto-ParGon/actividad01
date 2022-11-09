drop database if exists prestamos;
create database prestamos;
use prestamos;

create table usuario(
  id int not null auto_increment primary key,
  nombre varchar(255) not null,
  apellido varchar(255) not null,
  nickname varchar(100) not null,
  contrasena varchar(50) not null,
  is_admin boolean not null
);

create table dispositivo(
  id varchar(50) not null primary key,
  nombre varchar(255) not null,
  cantidad int not null,
  observaciones varchar(255)
);

# time=hh:mm date=YYYY-MM-DD
create table prestamo(
  id int not null auto_increment primary key,
  nom_solicitante varchar(255) not null,
  aula varchar(255) not null,
  materia varchar(255) not null,
  fecha date not null,
  horario_entrada time not null,
  horario_salida time not null,
  is_active boolean null,
  id_usuario int not null,
  foreign key (id_usuario) references usuario(id)
);

create table dispositivo_prestado(
  id_prestamo int not null,
  id_dispositivo varchar(50) not null,
  foreign key (id_prestamo) references prestamo(id),
  foreign key (id_dispositivo) references dispositivo(id)
);


# Usuario
insert into usuario (nombre, apellido, nickname, contrasena, is_admin) values (
  "luis",
  "ramirez",
  "admin",
  "1234",
  true
);

# Dispositivos
insert into dispositivo values ("F105", "control", 1, "Roto, tiene cinta adhesiva");
insert into dispositivo values ("1212", "HDMI", 8, "");
insert into dispositivo values ("1213", "Adaptador Mac", 3, "");

# Prestamos
insert into prestamo (nom_solicitante, aula, materia, fecha, horario_entrada, horario_salida, is_active, id_usuario) values (
  "Juan Armando Ramirez Perez",
  "F105",
  "Programacion",
  "2022-10-23",
  "17:00",
  "19:00",
  true,
  1
);

# Dispositivos asignados a un prestamo
insert into dispositivo_prestado () values (1, "F105");
insert into dispositivo_prestado values (1, "1212");
insert into dispositivo_prestado values (1, "1213");
