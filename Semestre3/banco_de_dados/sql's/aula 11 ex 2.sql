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


					
					
