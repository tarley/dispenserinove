#### Alteração da tabela de funcionario  ####
ALTER TABLE `dispenserinove`.`funcionario_farmacia` 
ADD COLUMN `ativo` BIT(1) NULL DEFAULT 1 COMMENT '' AFTER `ADMIN`;


#### Usuario Admin da aplicação ####
insert into funcionario_farmacia (nom_func, des_turno, cod_senha, nom_usuario, dta_cadastro, admin) 
values ('Administrador', 'N', 'e10adc3949ba59abbe56e057f20f883e', 'admin', '2016-05-31', 1);

####Carga da tabela de Situação####
insert into situacao_produto (des_status) values ('Em uso');
insert into situacao_produto (des_status) values ('Armazenado na fármacia');
insert into situacao_produto (des_status) values ('Vencido');
insert into situacao_produto (des_status) values ('Baixado');


