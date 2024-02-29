--Questao 1
SELECT pro.produto_nome,
       sub.subcategoria,
       cat.descricao
FROM produto pro
JOIN subcategoria sub USING (sub_codigo)
JOIN categoria cat USING (cat_codigo)
LEFT JOIN (
    SELECT DISTINCT pro.pro_codigo
    FROM PEDIDO PED
    JOIN item ite USING (ped_codigo)
    JOIN produto pro USING (pro_codigo)
    WHERE EXTRACT(YEAR FROM PED.DATA_PEDIDO) = 2017
      AND EXTRACT(MONTH FROM PED.DATA_PEDIDO) = 1
) pedidos_2017 ON pro.pro_codigo = pedidos_2017.pro_codigo
WHERE pedidos_2017.pro_codigo IS NULL
ORDER BY pro.produto_nome;


--Questao 2

SELECT COALESCE(SUM(ite.valor_lucro), 0) AS lucro,
       COALESCE(cid.estado, '-') AS estado,
       COALESCE(sub.subcategoria, '-') AS subcategoria
FROM pedido ped
JOIN item ite USING (ped_codigo)
JOIN produto pro USING (pro_codigo)
JOIN subcategoria sub USING (sub_codigo)
JOIN categoria cat USING (cat_codigo)
JOIN consumidor con USING (con_codigo)
JOIN segmento seg USING (seg_codigo)
JOIN cidade cid USING (cid_codigo)
WHERE EXTRACT(YEAR FROM PED.DATA_PEDIDO) = 2017
  AND seg.descricao = 'Corporate'
  AND cat.descricao = 'Technology'
GROUP BY cube(cid.estado, sub.subcategoria);

--Questao 3
		 
SELECT COALESCE(CID.CIDADE, NULL) AS CIDADE,
       COALESCE(REG.regiao, NULL) AS regiao,
       SUM(CASE WHEN EXTRACT(YEAR FROM PED.DATA_PEDIDO) = 2014 THEN 1 ELSE 0 END) AS ANO2014,
       SUM(CASE WHEN EXTRACT(YEAR FROM PED.DATA_PEDIDO) = 2015 THEN 1 ELSE 0 END) AS ANO2015,
       SUM(CASE WHEN EXTRACT(YEAR FROM PED.DATA_PEDIDO) = 2016 THEN 1 ELSE 0 END) AS ANO2016,
       SUM(CASE WHEN EXTRACT(YEAR FROM PED.DATA_PEDIDO) = 2017 THEN 1 ELSE 0 END) AS ANO2017
FROM ITEM ITE
JOIN PRODUTO PRO ON ITE.PRO_CODIGO = PRO.PRO_CODIGO
JOIN SUBCATEGORIA SUB ON PRO.SUB_CODIGO = SUB.SUB_CODIGO
JOIN categoria CAT USING (cat_codigo)
JOIN PEDIDO PED ON ITE.PED_CODIGO = PED.PED_CODIGO
JOIN consumidor con USING (con_codigo)
JOIN cidade cid USING (cid_codigo)
JOIN regiao REG USING (reg_codigo)
WHERE CAT.descricao = 'Technology'
GROUP BY ROLLUP(REG.regiao, CID.CIDADE)
ORDER BY CID.CIDADE;

--Questao 4
WITH SUB AS
  (SELECT SEG.descricao AS SEGMENTO,
          CAT.descricao AS CATEGORIA,
          REG.regiao AS REGIAO,
          SUM(ITE.VALOR_BRUTO) AS VALOR
   FROM ITEM ITE
   JOIN PEDIDO PED USING (ped_codigo)
   JOIN CONSUMIDOR CON USING (con_codigo)
   JOIN SEGMENTO SEG USING (seg_codigo)
   JOIN CIDADE CID USING (cid_codigo)
   JOIN REGIAO REG USING (reg_codigo)
   JOIN PRODUTO PRO USING (pro_codigo)
   JOIN SUBCATEGORIA SUB USING (sub_codigo)
   JOIN CATEGORIA CAT USING (cat_codigo)
   GROUP BY 1,
            2,
            3)
SELECT SEGMENTO,
       CATEGORIA,
       REGIAO,
       VALOR,
       SUM(VALOR) OVER (PARTITION BY SEGMENTO) AS TOTAL_SEGMENTO,
       ROUND((VALOR/SUM(VALOR) OVER (PARTITION BY SEGMENTO) * 100)::numeric, 2) AS PERC_TOTAL_SEGMENTO,
       SUM(VALOR) OVER (PARTITION BY CATEGORIA) AS TOTAL_CATEGORIA,
       ROUND((VALOR/SUM(VALOR) OVER (PARTITION BY CATEGORIA) * 100)::numeric, 2) AS PERC_TOTAL_CATEGORIA,
       SUM(VALOR) OVER (PARTITION BY REGIAO) AS TOTAL_REGIAO,
       ROUND((VALOR/SUM(VALOR) OVER (PARTITION BY REGIAO) * 100)::numeric, 2) AS PERC_TOTAL_REGIAO,
       RANK() OVER (PARTITION BY SEGMENTO ORDER BY VALOR DESC) AS RANK
FROM SUB;

--Questao 5

WITH SUB AS
  (SELECT CAT.descricao AS CATEGORIA,
          EXTRACT(YEAR FROM PED.DATA_PEDIDO) AS ANO,
          SUM(ITE.VALOR_LUCRO) AS VALOR
   FROM ITEM ITE
   JOIN PEDIDO PED ON ITE.PED_CODIGO = PED.PED_CODIGO
   JOIN PRODUTO PRO USING (pro_codigo)
   JOIN subcategoria SUB USING (sub_codigo)
   JOIN CATEGORIA CAT USING (cat_codigo)
   GROUP BY 1, 2)
       
SELECT CATEGORIA,
       ANO,
       VALOR,
       VALOR - LAG(VALOR, 1, VALOR) OVER (PARTITION BY CATEGORIA ORDER BY ANO) AS DIFERENCA,
	   ((VALOR*100)/(LAG(VALOR, 1, VALOR) OVER (PARTITION BY CATEGORIA ORDER BY ANO))) -100 AS DIFERENCA_PERCENT
FROM SUB;