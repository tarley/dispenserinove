/*==============================================================*/
/* DBMS name:      Microsoft SQL Server 2008                    */
/* Created on:     07/05/2016 12:22:25                          */
/*==============================================================*/


/*==============================================================*/
/* Table: funcionario_farmacias                                 */
/*==============================================================*/
create table funcionario_farmacias (
   cod_func             integer              not null,
   nom_func             varchar(50)          null,
   des_turno            varchar(20)          null,
   num_ramal            integer              null,
   cod_senha            varchar(10)          null
)
go

alter table funcionario_farmacias
   add constraint PK_FUNCIONARIO_FARMACIAS primary key (cod_func)
go

/*==============================================================*/
/* Table: historico_retornos                                    */
/*==============================================================*/
create table historico_retornos (
   cod_retorno          int                  not null,
   cod_retirada         integer              not null,
   dta_retorno          date                 not null,
   num_quant_retorno    integer              null,
   des_motivo           varchar(300)         null
)
go

alter table historico_retornos
   add constraint PK_HISTORICO_RETORNOS primary key (cod_retirada, cod_retorno)
go

/*==============================================================*/
/* Table: produtos                                              */
/*==============================================================*/
create table produtos (
   cod_produto          integer              not null,
   des_produto          varchar(100)         null
)
go

alter table produtos
   add constraint PK_PRODUTOS primary key (cod_produto)
go

/*==============================================================*/
/* Table: produtos_retirados                                    */
/*==============================================================*/
create table produtos_retirados (
   cod_retirada         integer              not null,
   cod_status           integer              not null,
   cod_atendimento      integer              not null,
   cod_produto          integer              not null,
   cod_func             integer              null,
   num_quant_saida      integer              null,
   dta_saida            date                 null
)
go

alter table produtos_retirados
   add constraint PK_PRODUTOS_RETIRADOS primary key (cod_retirada)
go

/*==============================================================*/
/* Table: registro_atendimentos                                 */
/*==============================================================*/
create table registro_atendimentos (
   cod_atendimento      integer              not null,
   nom_paciente         varchar(50)          null
)
go

alter table registro_atendimentos
   add constraint PK_REGISTRO_ATENDIMENTOS primary key (cod_atendimento)
go

/*==============================================================*/
/* Table: situacao_produtos                                     */
/*==============================================================*/
create table situacao_produtos (
   cod_status           integer              not null,
   des_status           varchar(100)         null
)
go

alter table situacao_produtos
   add constraint PK_SITUACAO_PRODUTOS primary key (cod_status)
go

alter table historico_retornos
   add constraint retirados_retornos foreign key (cod_retirada)
      references produtos_retirados (cod_retirada)
go

alter table produtos_retirados
   add constraint atendimentos_retirados foreign key (cod_atendimento)
      references registro_atendimentos (cod_atendimento)
go

alter table produtos_retirados
   add constraint funcionarios_retiradas foreign key (cod_func)
      references funcionario_farmacias (cod_func)
go

alter table produtos_retirados
   add constraint produtos_retirados foreign key (cod_produto)
      references produtos (cod_produto)
go

alter table produtos_retirados
   add constraint situacoes_retiradas foreign key (cod_status)
      references situacao_produtos (cod_status)
go

