drop database if exists school_life;
create database school_life;
use school_life;

create table if not exists usuario(
  idUsuario int auto_increment primary key,
  nomeUsuario varchar(120) not null,
  nickUsuario varchar(60) not null unique,
  senhaUsuario varchar(80) not null
);

create table if not exists professor(
  idProfessor int auto_increment primary key,
  nome varchar (120) not null,
  email varchar (100),

  idUserFK int not null,
  foreign key (idUserFK) references usuario(idUsuario)
);

create table if not exists materia(
  idMateria int auto_increment primary key,
  nome varchar (120) not null,

  idProfessorFK int not null,
  idUserFK int not null,
  foreign key (idProfessorFK) references professor(idProfessor),
  foreign key (idUserFK) references usuario(idUsuario)
);

create table if not exists tipo_atividade(
  idtipo_atividade int auto_increment primary key,
  nome varchar (60) not null,

  idUserFK int not null,
  foreign key (idUserFK) references usuario(idUsuario)
);

create table if not exists atividade(
  idAtividade  int auto_increment primary key,
  data_entrega date not null,
  nome varchar (120) not null,
  prioridade varchar (30) not null,
  pontuacao int not null,
  situacao varchar(30) not null,

  idTipo_AtividadeFK int not null,
  idMateriaFK int not null,
  idUserFK int not null,
  foreign key (idTipo_AtividadeFK) references tipo_atividade(idtipo_atividade),
  foreign key (idMateriaFK) references materia(idMateria),
  foreign key (idUserFK) references usuario(idUsuario)
);

insert into usuario values(null, 'Administrador', 'admin', 'admin');
