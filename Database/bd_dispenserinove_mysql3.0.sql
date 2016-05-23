/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     23/05/2016 16:51:41                          */
/*==============================================================*/


drop table if exists FUNCIONARIO_FARMACIA;

drop table if exists HISTORICO_RETORNO;

drop table if exists PRODUTO;

drop table if exists PRODUTO_RETIRADO;

drop table if exists REGISTRO_ATENDIMENTO;

drop table if exists SITUACAO_PRODUTO;

/*==============================================================*/
/* Table: FUNCIONARIO_FARMACIA                                  */
/*==============================================================*/
create table FUNCIONARIO_FARMACIA
(
   COD_FUNC             integer not null auto_increment,
   NOM_FUNC             varchar(50),
   DES_TURNO            varchar(20),
   COD_SENHA            varchar(32),
   NOM_USUARIO          varchar(20),
   DTA_CADASTRO         date,
   ADMIN                boolean,
   primary key (COD_FUNC)
);

/*==============================================================*/
/* Table: HISTORICO_RETORNO                                     */
/*==============================================================*/
create table HISTORICO_RETORNO
(
   COD_RETORNO          integer not null auto_increment,
   COD_RETIRADA         integer not null,
   DTA_RETORNO          date,
   NUM_QUANT_RETORNO    integer,
   DES_MOTIVO           varchar(300),
   primary key (COD_RETORNO, COD_RETIRADA)
);

/*==============================================================*/
/* Table: PRODUTO                                               */
/*==============================================================*/
create table PRODUTO
(
   COD_PRODUTO          integer not null,
   DES_PRODUTO          varchar(100),
   primary key (COD_PRODUTO)
);

/*==============================================================*/
/* Table: PRODUTO_RETIRADO                                      */
/*==============================================================*/
create table PRODUTO_RETIRADO
(
   COD_RETIRADA         integer not null auto_increment,
   COD_ATENDIMENTO      integer,
   COD_PRODUTO          integer,
   COD_STATUS           integer,
   COD_FUNC             integer,
   NUM_QUANT_SAIDA      integer,
   DTA_SAIDA            date,
   primary key (COD_RETIRADA)
);

/*==============================================================*/
/* Table: REGISTRO_ATENDIMENTO                                  */
/*==============================================================*/
create table REGISTRO_ATENDIMENTO
(
   COD_ATENDIMENTO      integer not null,
   NOM_PACIENTE         varchar(50),
   primary key (COD_ATENDIMENTO)
);

/*==============================================================*/
/* Table: SITUACAO_PRODUTO                                      */
/*==============================================================*/
create table SITUACAO_PRODUTO
(
   COD_STATUS           integer not null auto_increment,
   DES_STATUS           varchar(100),
   primary key (COD_STATUS)
);

alter table HISTORICO_RETORNO add constraint retirado_retorno foreign key (COD_RETIRADA)
      references PRODUTO_RETIRADO (COD_RETIRADA) on delete restrict on update restrict;

alter table PRODUTO_RETIRADO add constraint atendimento_retirado foreign key (COD_ATENDIMENTO)
      references REGISTRO_ATENDIMENTO (COD_ATENDIMENTO) on delete restrict on update restrict;

alter table PRODUTO_RETIRADO add constraint funcionario_retirado foreign key (COD_FUNC)
      references FUNCIONARIO_FARMACIA (COD_FUNC) on delete restrict on update restrict;

alter table PRODUTO_RETIRADO add constraint produto_retirado foreign key (COD_PRODUTO)
      references PRODUTO (COD_PRODUTO) on delete restrict on update restrict;

alter table PRODUTO_RETIRADO add constraint situacao_produto foreign key (COD_STATUS)
      references SITUACAO_PRODUTO (COD_STATUS) on delete restrict on update restrict;

