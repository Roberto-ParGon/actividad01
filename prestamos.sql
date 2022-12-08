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

create table alumno(
  matricula varchar(9) primary key,
  nombre varchar(100) not null,
  apellidoPaterno varchar(100) not null,
  apellidoMaterno varchar(100) not null,
  carrera varchar(50) not null
);

create table profesor(
  noPersonal varchar(5) primary key,
  nombre varchar(100) not null
);

create table aula (
  id int not null auto_increment primary key,
  nombre varchar(255) not null
);

create table materia (
  nrc varchar(5) not null primary key,
  nombre varchar(255) not null
);

# time=hh:mm date=YYYY-MM-DD
create table prestamo(
  id int not null auto_increment primary key,
  fecha date not null,
  horario_entrada time not null,
  horario_salida time not null,
  is_active boolean null,
  nrc_materia varchar(5) not null,
  id_aula int not null,
  id_usuario int not null,
  id_profesor varchar(5),
  id_alumno varchar(9),
  foreign key (id_usuario) references usuario(id),
  foreign key (id_profesor) references profesor(noPersonal),
  foreign key (id_alumno) references alumno(matricula),
  foreign key (nrc_materia) references materia(nrc),
  foreign key (id_aula) references aula(id)
);

create table dispositivo(
  id varchar(50) not null primary key,
  nombre varchar(255) not null,
  cantidad int not null,
  prestado int not null,
  observaciones varchar(255)
);

create table dispositivo_prestado(
  id_prestamo int not null,
  id_dispositivo varchar(50) not null,
  prestado int not null,
  foreign key (id_prestamo) references prestamo(id),
  foreign key (id_dispositivo) references dispositivo(id)
);

# Usuario
insert into usuario (nombre, apellido, nickname, contrasena, is_admin) values (
  "luan",
  "avila",
  "luvi",
  "1234",
  true
);

insert into usuario (nombre, apellido, nickname, contrasena, is_admin) values (
  "marin",
  "aristeo",
  "goodboy",
  "1234",
  false
);

# Alumno
insert into alumno values (
  "s18014519",
  "CRISTIAN YAIR",
  "PENA",
  "CABRERA",
  "Tecnologias Computacionales"
);

insert into alumno values (
  "s19016407",
  "ROBERTO",
  "GONZALEZ",
  "PARTIDA",
  "Tecnologias Computacionales"
);

insert into alumno values (
  "s20022111",
  "OMAR ALFREDO",
  "HIDALGO",
  "JACINTO",
  "Tecnologias Computacionales"
);

insert into alumno values (
  "s19016388",
  "ANA PAULA",
  "ALVAN",
  "ARGUELLES",
  "Tecnologias Computacionales"
);

insert into alumno values (
  "s19023888",
  "AMAYRANI PAOLA",
  "MARTINEZ",
  "VILLA",
  "Tecnologias Computacionales"
);

insert into alumno values (
  "s19030171",
  "RICARDO",
  "MARTINEZ",
  "OLIVO",
  "Tecnologias Computacionales"
);

insert into alumno values (
  "s20018152",
  "MAILENE GABRIELA",
  "ALPUCHE",
  "VELAZQUEZ",
  "Tecnologias Computacionales"
);

insert into alumno values (
  "s20018150",
  "MATTAI",
  "MARTINEZ",
  "MONTERO",
  "Tecnologias Computacionales"
);

insert into alumno values (
  "s18019963",
  "EDGAR ANTONIO",
  "JIMENEZ",
  "LOPEZ",
  "Tecnologias Computacionales"
);

insert into alumno values (
  "s19016410",
  "JOYCE ENID",
  "GARCIA",
  "LOPEZ",
  "Tecnologias Computacionales"
);

insert into alumno values (
  "s18014489",
  "CESAR ALEJANDRO",
  "VALLEJO",
  "GALVAN",
  "Tecnologias Computacionales"
);

#profesor
insert into profesor values ("12310", "MA. DE LOS ANGELES NAVARRO GUERRERO");
insert into profesor values ("12345", "MA. DEL CARMEN MEZURA GODOY");
insert into profesor values ("12346", "ERIKA MENESES RICO");
insert into profesor values ("12347", "MAX WILLIAM MILLAN MARTINEZ");
insert into profesor values ("12348", "JOSE GUILLERMO HERNANDEZ CALDERON");
insert into profesor values ("12349", "ALICIA YAZMIN ROJAS LUNA");

# Dispositivos
insert into dispositivo values ("F101", "control F101", 1, 0, "Un boton no sirve");
insert into dispositivo values ("F102", "control F102", 1, 0, "");
insert into dispositivo values ("F103", "control F103", 1, 0, "Restos de chocolate");
insert into dispositivo values ("F104", "control F104", 1, 0, "");
insert into dispositivo values ("F105", "control F105", 1, 0, "Roto, tiene cinta adhesiva");
insert into dispositivo values ("1212", "HDMI", 5, 0, "");
insert into dispositivo values ("1213", "Adaptador Mac", 3, 0, "");
insert into dispositivo values ("1214", "Adaptador GBA", 4, 0, "Pines rotos");
insert into dispositivo values ("1215", "Laptop", 2, 0, "Sin procesadores");

# Aulas
insert into aula (nombre) values ("F101");
insert into aula (nombre) values ("F102");
insert into aula (nombre) values ("F103");
insert into aula (nombre) values ("F104");
insert into aula (nombre) values ("F105");
insert into aula (nombre) values ("CC1");
insert into aula (nombre) values ("CC2");

# materia
insert into materia values ("12345", "Programacion Avanzada");
insert into materia values ("23456", "Estadistica Retrospectiva");
insert into materia values ("34567", "Pensamiento Estructural Complejo");
insert into materia values ("45678", "Metodologias");
insert into materia values ("45679", "Investigacion de computadores");
insert into materia values ("45680", "Como atender un ciber 1");
#######################################################################

# Obtener id, nombre, observaciones de los dispositivos en un prestamo con el id del prestamo
select d.id, d.nombre, d.observaciones
from dispositivo_prestado as dp
inner join dispositivo as d on dp.id_dispositivo=d.id
where dp.id_prestamo=1;
