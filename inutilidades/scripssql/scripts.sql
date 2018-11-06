create database nombrebd
  default character set utf8
  collate utf8_general_ci;
  
create user usuariobd@localhost
  identified by 'clavebd';

grant all
  on nombrebd.*
  to usuariobd@localhost;

flush privileges;

create table producto (
    id bigint not null auto_increment primary key,
    nombre varchar(30) not null,
    precio numeric(10, 3) not null,
    observaciones text
) engine = innodb
  character set utf8
  collate utf8_general_ci;
  
create table usuario (
    id
    correo
    alias
    nombre
    clave
    activo
    fechaalta
) engine = innodb
  character set utf8
  collate utf8_general_ci;
  
create table fecha (
    id bigint not null auto_increment primary key,
    fecha date,
    fechahora datetime,
    marcatiempo timestamp default current_timestamp on update current_timestamp
) engine = innodb
  character set utf8
  collate utf8_general_ci;