

create database nombrebd
  default character set utf8
  collate utf8_general_ci;

create user usuariobd@localhost
  identified by 'clavebd';

grant all
  on nombrebd.*
  to usuariobd@localhost;

flush privileges;







create table nombretabla (id bigint not null auto_increment,
nombre varchar(30)not null,
precio numeric (10, 3) not null,

) engine = innodb
  character set utf8
  collate utf8_general_ci;