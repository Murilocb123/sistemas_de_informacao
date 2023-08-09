-----PROVA MURILO COSTA BITTENCOURT

--1. Listar o nome do cliente, endereço, cep, valor_venda (preço_venda * unidade) das
--vendas realizadas no ano 1997 e mês de janeiro ordenando por nome do cliente;
  SELECT tbcliente.nome_completo, 
  		 tbcliente.endereco, 
		 tbcliente.cep,
		 tbvenda.preco_venda * tbvenda.unidade as valor_venda
    FROM vendas  AS tbvenda
    JOIN cliente AS tbcliente
	  ON tbcliente.codigo = tbvenda.cliente_codigo
    JOIN periodo AS tbperiodo
	  ON tbperiodo.codigo = tbvenda.periodo_codigo
   WHERE tbperiodo.ano = 1997
     AND tbperiodo.mes = 1
ORDER BY tbcliente.nome_completo;



--2. Listar o país, estado, cidade, endereço, cep, nome do cliente, sexo, valor_venda
--das vendas com custo unitário superiores a 5;
SELECT tbregiao.pais,
	   tbregiao.estado,
	   tbregiao.cidade,
	   tbcliente.endereco,
	   tbcliente.cep,
	   tbcliente.nome_completo,
	   tbcliente.sexo,
	   tbvenda.preco_venda * tbvenda.unidade as valor_venda
  FROM vendas  AS tbvenda
  JOIN cliente AS tbcliente
    ON tbcliente.codigo = tbvenda.cliente_codigo
  JOIN regiao  AS tbregiao
    ON tbregiao.codigo = tbcliente.regiao_codigo
 WHERE tbvenda.custo_unitario > 5; 

--3. Listar a média das vendas por categoria, subcategoria no ano 1997;
  SELECT tbclasse.categoria, 
         tbclasse.subcategoria,
		 AVG(tbvenda.preco_venda * tbvenda.unidade) as valor_medio_vendas
    FROM vendas  AS tbvenda
    JOIN produto AS tbproduto
      ON tbproduto.codigo = tbvenda.produto_codigo
    JOIN classe  AS tbclasse
  	  ON tbclasse.codigo = tbproduto.classe_codigo
    JOIN periodo AS tbperiodo
      ON tbperiodo.codigo = tbvenda.periodo_codigo
   WHERE tbperiodo.ano = 1997
GROUP BY tbclasse.categoria, tbclasse.subcategoria; 

--4. Listar a média do lucro líquido por ano, mês, tipo_loja, somente quando a média for
--superior a 50;
  SELECT tbperiodo.ano,
         tbperiodo.mes,
		 tbloja.tipo,
		 AVG(tbvenda.preco_venda * tbvenda.unidade - tbvenda.custo_unitario * tbvenda.unidade) 
		 AS media_lucro_liquido
    FROM vendas  AS tbvenda
	JOIN loja    AS tbloja
	  ON tbloja.codigo = tbvenda.loja_codigo
	JOIN periodo AS tbperiodo
	  ON tbperiodo.codigo = tbvenda.periodo_codigo
GROUP BY tbperiodo.ano,
         tbperiodo.mes,
		 tbloja.tipo
 HAVING AVG(tbvenda.preco_venda * tbvenda.unidade - tbvenda.custo_unitario * tbvenda.unidade) > 5;
	
	

--5. Listar a soma das vendas por país, estado, cidade do ano de 1997 e que foram
--superiores a 1000.
 SELECT  tbregiao.pais,
         tbregiao.estado,
         tbregiao.cidade,
         SUM(tbvenda.preco_venda * tbvenda.unidade) AS valor_venda
    FROM vendas as tbvenda
    JOIN periodo as tbperiodo
      ON tbperiodo.codigo = tbvenda.periodo_codigo
    JOIN cliente as tbcliente
      ON tbcliente.codigo = tbvenda.cliente_codigo
    JOIN regiao as tbregiao
      ON tbregiao.codigo = tbcliente.regiao_codigo
   WHERE tbperiodo.ano = 1997
GROUP BY tbregiao.pais,
         tbregiao.estado,
         tbregiao.cidade
  HAVING SUM(tbvenda.preco_venda * tbvenda.unidade) > 1000