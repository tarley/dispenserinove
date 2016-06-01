/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     23/05/2016 16:51:41                          */
/*==============================================================*/


drop table if exists funcionario_farmacia;

drop table if exists historico_retorno;

drop table if exists produto;

drop table if exists produto_retirado;

drop table if exists registro_atendimento;

drop table if exists situacao_produto;

/*==============================================================*/
/* Table: FUNCIONARIO_FARMACIA                                  */
/*==============================================================*/
create table funcionario_farmacia
(
   cod_func             integer not null auto_increment,
   nom_func             varchar(50),
   des_turno            varchar(20),
   cod_senha            varchar(32),
   nom_usuario          varchar(20),
   dta_cadastro         date,
   admin                boolean,
   primary key (cod_func)
);

/*==============================================================*/
/* Table: HISTORICO_RETORNO                                     */
/*==============================================================*/
create table historico_retorno
(
   cod_retorno          integer not null auto_increment,
   cod_retirada         integer not null,
   dta_retorno          date,
   num_quant_retorno    integer,
   des_motivo           varchar(300),
   primary key (cod_retorno, cod_retirada)
);

/*==============================================================*/
/* Table: PRODUTO                                               */
/*==============================================================*/
create table produto
(
   cod_produto          integer not null,
   des_produto          varchar(100),
   primary key (cod_produto)
);

/*==============================================================*/
/* Table: PRODUTO_RETIRADO                                      */
/*==============================================================*/
create table produto_retirado
(
   cod_retirada         integer not null auto_increment,
   cod_atendimento      integer,
   cod_produto          integer,
   cod_status           integer,
   cod_func             integer,
   num_quant_saida      integer,
   dta_saida            date,
   primary key (cod_retirada)
);

/*==============================================================*/
/* Table: REGISTRO_ATENDIMENTO                                  */
/*==============================================================*/
create table registro_atendimento
(
   cod_atendimento      integer not null,
   nom_paciente         varchar(50),
   primary key (cod_atendimento)
);

/*==============================================================*/
/* Table: SITUACAO_PRODUTO                                      */
/*==============================================================*/
create table situacao_produto
(
   cod_status           integer not null auto_increment,
   des_status           varchar(100),
   primary key (cod_status)
);

alter table historico_retorno add constraint retirado_retorno foreign key (cod_retirada)
      references produto_retirado (cod_retirada) on delete restrict on update restrict;

alter table produto_retirado add constraint atendimento_retirado foreign key (cod_atendimento)
      references registro_atendimento (cod_atendimento) on delete restrict on update restrict;

alter table produto_retirado add constraint funcionario_retirado foreign key (cod_func)
      references funcionario_farmacia (cod_func) on delete restrict on update restrict;

alter table produto_retirado add constraint produto_retirado foreign key (cod_produto)
      references produto (cod_produto) on delete restrict on update restrict;

alter table produto_retirado add constraint situacao_produto foreign key (cod_status)
      references situacao_produto (cod_status) on delete restrict on update restrict;

