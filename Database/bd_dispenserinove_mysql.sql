/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     17/05/2016 22:29:27                          */
/*==============================================================*/


drop table if exists FUNCIONARIO_FARMACIAS;

drop table if exists HISTORICO_RETORNOS;

drop table if exists PRODUTOS;

drop table if exists PRODUTOS_RETIRADOS;

drop table if exists REGISTRO_ATENDIMENTOS;

drop table if exists SITUACAO_PRODUTO;

/*==============================================================*/
/* Table: FUNCIONARIO_FARMACIAS                                 */
/*==============================================================*/
create table FUNCIONARIO_FARMACIAS
(
   COD_FUNC             integer not null,
   NOM_FUNC             varchar(50),
   DES_TURNO            varchar(20),
   NUM_RAMAL            integer,
   COD_SENHA            varchar(10),
   primary key (COD_FUNC)
);

/*==============================================================*/
/* Table: HISTORICO_RETORNOS                                    */
/*==============================================================*/
create table HISTORICO_RETORNOS
(
   COD_RETORNO          integer not null,
   COD_RETIRADA         integer not null,
   DTA_RETORNO          date,
   NUM_QUANT_RETORNO    integer,
   DES_MOTIVO           varchar(300),
   primary key (COD_RETORNO, COD_RETIRADA)
);

/*==============================================================*/
/* Table: PRODUTOS                                              */
/*==============================================================*/
create table PRODUTOS
(
   COD_PRODUTO          integer not null,
   DES_PRODUTO          varchar(100),
   primary key (COD_PRODUTO)
);

/*==============================================================*/
/* Table: PRODUTOS_RETIRADOS                                    */
/*==============================================================*/
create table PRODUTOS_RETIRADOS
(
   COD_RETIRADA         integer not null,
   COD_ATENDIMENTO      integer,
   COD_PRODUTO          integer,
   COD_STATUS           integer,
   COD_FUNC             integer,
   NUM_QUANT_SAIDA      integer,
   DTA_SAIDA            date,
   primary key (COD_RETIRADA)
);

/*==============================================================*/
/* Table: REGISTRO_ATENDIMENTOS                                 */
/*==============================================================*/
create table REGISTRO_ATENDIMENTOS
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
   COD_STATUS           integer not null,
   DES_STATUS           varchar(100),
   primary key (COD_STATUS)
);

alter table HISTORICO_RETORNOS add constraint retirados_retornos foreign key (COD_RETIRADA)
      references PRODUTOS_RETIRADOS (COD_RETIRADA) on delete restrict on update restrict;

alter table PRODUTOS_RETIRADOS add constraint atendimentos_retirados foreign key (COD_ATENDIMENTO)
      references REGISTRO_ATENDIMENTOS (COD_ATENDIMENTO) on delete restrict on update restrict;

alter table PRODUTOS_RETIRADOS add constraint funcionarios_retirados foreign key (COD_FUNC)
      references FUNCIONARIO_FARMACIAS (COD_FUNC) on delete restrict on update restrict;

alter table PRODUTOS_RETIRADOS add constraint produtos_retirados foreign key (COD_PRODUTO)
      references PRODUTOS (COD_PRODUTO) on delete restrict on update restrict;

alter table PRODUTOS_RETIRADOS add constraint situacoes_retiradas foreign key (COD_STATUS)
      references SITUACAO_PRODUTO (COD_STATUS) on delete restrict on update restrict;

