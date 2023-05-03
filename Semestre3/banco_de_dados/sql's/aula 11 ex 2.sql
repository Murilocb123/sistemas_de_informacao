-- Criando a tabela de cliente
create table cliente(cli_codigo serial,
					nome varchar(30),
					constraint pk_cliente primary key(cli_codigo));
					
-- Criando a tabela de telefone					
create table telefone(tel_numero char(15),
					constraint pk_telefone primary key(tel_numero));
					
--Adcionando uma coluna que esqueci de colocar					
alter table telefone add column cli_codigo integer not null;
----------------------------------------------------------------------
create table faixa(fxa_sequencia serial,
				   descricao varchar(20) not null,
				   desconto dec(10,2) not null,
				   constraint pk_faixa primary key(fxa_sequencia));

create table cor(cor_sequencia serial,
				 descricao varchar(30) not null,
				 constraint pk_cor primary key(cor_sequencia));

create table dimensao(dim_sequencia serial,
					  descricao varchar(20) not null,
					  altura integer not null,
					  largura integer not null,
					  constraint pk_dimensao primary key(dim_sequencia));
				  
create table material(mat_sequencia serial ,
					  descricao varchar(20) not null,
					  custo dec(10,2) not null,
					  valorletra dec(10,2) not null,
					  constraint pk_material primary key(mat_sequencia));
					  
create table pedido(ped_numero integer not null,
				   	data timestamp not null,
				    valor dec(10,2) not null,
				    sinal dec(10,2) not null,
				    quantidade integer not null,
				    cli_codigo integer not null,
				   	fxa_sequencia integer not null,
					constraint pk_pedido primary key(ped_numero));
					
create table placa(ped_numero integer not null,
				   plc_sequencia integer not null,
				   frase varchar(100) not null,
				   dim_sequencia integer not null,
				   mat_sequencia integer not null,
				   cor_sequencia_fundo integer not null,
				   cor_sequencia_frase integer not null,
				   valor dec(10,2),
				   constraint pk_placa primary key(plc_sequencia)
				  );
				  
				  
				  
--Adicionando relacionamento
alter table telefone add constraint cliente_telefone_fk
foreign key (cli_codigo)
references cliente (cli_codigo);
----------------------------------
create table produto (pro_codigo serial,
					  descricao varchar(40) not null,
					  valorunitario dec(10,2) not null,
					  estoque integer not null,
					  cat_codigo integer not null,
					  constraint pk_produto primary key(pro_codigo));
					  
create table pedido (ped_numero serial,
					 data_hora timestamp not null,
					 mesa integer not null,
					 lugares integer not null,
					 valor dec(10,2),
					 constraint pk_pedido primary key(ped_numero));
drop table item;
create table item(ped_numero integer not null,
				  pro_codigo integer not null,
				  quantidade integer not null,
				  constraint pk_item primary key(ped_numero,pro_codigo),
				  constraint fk_pedido foreign key (ped_numero) references pedido (ped_numero) ON DELETE CASCADE,
				  constraint fk_codigo foreign key (pro_codigo) references produto (pro_codigo));
				  
create table categoria(cat_codigo serial,
					   descricao varchar(40) not null,
					   constraint pk_categoria primary key(cat_codigo));
					   
create table mesa(mes_codigo serial,
				  lugares integer not null,
				  ocupado integer not null,
				  constraint pk_mesa primary key(mes_codigo));

alter table pedido drop column lugares;

alter table produto add constraint fk_categoria 
foreign key (cat_codigo) references categoria (cat_codigo);

alter table pedido rename column mesa to mes_codigo;

alter table pedido add constraint fk_mesa
foreign key (mes_codigo) references mesa (mes_codigo);


insert into categoria(descricao) values('Bebidas');
insert into categoria(descricao) values('Suchi');
insert into categoria(descricao) values('Hamburger');
select *from categoria

insert into mesa(lugares, ocupado) values(4, 0);
insert into mesa(lugares, ocupado) values(10, 0);
insert into mesa(lugares, ocupado) values(2, 0);
insert into mesa(lugares, ocupado) values(1, 0);
select*from mesa;

insert into produto(descricao, valorunitario, estoque, cat_codigo) values('Amstel sem Gluten', 4.10, 1);




					
					
