-- 1)SELECT ... FROM ... JOIN ... WHERE ... GROUP BY 
-- Quantidade de produtos fornecidos pelo 'USA','Brazil', 'Germany'   
  SELECT sup.country, COUNT(prod.product_id) as qtd_produtos
	FROM products AS prod
	JOIN suppliers AS sup
	  ON sup.supplier_id = prod.supplier_id
   WHERE sup.country in ('USA','Brazil', 'Germany')
GROUP BY sup.country;

--2) SELECT ... FROM ... JOIN ... GROUP BY ... HAVING ....
-- Lista os paises e sua quantidade de produtos fornecidos desde de que seja maior que 3
  SELECT sup.country, COUNT(prod.product_id) as qtd_produtos
	FROM products AS prod
	JOIN suppliers AS sup
	  ON sup.supplier_id = prod.supplier_id
GROUP BY sup.country
  HAVING COUNT(prod.product_id) > 3;
  
--3) SELECT ... FROM ... JOIN ... GROUP BY ... HAVING ....
-- Lista os paises e sua quantidade de produtos fornecidos desde de que seja maior que 3  
  SELECT sup.country, COUNT(prod.product_id) as qtd_produtos
	FROM products AS prod
	JOIN suppliers AS sup
	  ON sup.supplier_id = prod.supplier_id
   WHERE sup.company_name like any(array['l%', 'L%'])
GROUP BY sup.country
  HAVING COUNT(prod.product_id) > 2;
  
  
--4) SELECT ...,  (SELECT ...) FROM ... WHERE …
-- Quantida de Itens por pedido maior que tres
SELECT ord.order_id,
      (SELECT count(8)
         FROM order_details as ord_detail
 WHERE ord_detail.order_id = ord.order_id) AS QTD
  FROM orders ord
 WHERE ord.order_id > 3; 
 
--5) SELECT ... FROM (SELECT... ) ORDER BY
--Quantida de Itens por pedido em ordem crescente
 SELECT * 
    FROM (SELECT ord.order_id,
           (SELECT count(*)
              FROM order_details as ord_detail
             WHERE ord_detail.order_id = ord.order_id) AS qtd
          FROM orders ord) as id_qtd 
ORDER BY qtd

--6)WITH ... SELECT … FROM … GROUP BY …
WITH pessoas_qtd AS
(SELECT first_name, count(*) 
 FROM employees GROUP BY first_name)
select *from pessoas_qtd;
--7)WITH ... SELECT … FROM … WHERE … GROUP BY
-- lista o id das pessoas que possuem pedidos com mais de 10000 reais bruto vinculado ao seu usuario 
WITH itens_pedido AS
(SELECT ord.order_id,
           (SELECT sum(unit_price * quantity)
              FROM order_details as ord_detail
             WHERE ord_detail.order_id = ord.order_id) AS preco_bruto
 			, employee_id
          FROM orders ord)
select employee_id from itens_pedido where preco_bruto > 10000 group by employee_id;
--8)SELECT ... FROM ... JOIN ... WHERE ... (SELECT ...)
-- Lista O id do produto e o pais de produtos que nao tem o nome da caregoria como Confections
 SELECT prod.product_id,sup.country
	FROM products AS prod
	JOIN suppliers AS sup
	  ON sup.supplier_id = prod.supplier_id
WHERE prod.category_id NOT IN (SELECT category_id FROM categories where category_name like 'Confections');
  

--9)SELECT ... FROM ... JOIN ... GROUP BY ... HAVING ... (SELECT...)
 SELECT prod.category_id,sup.country
	FROM products AS prod
	JOIN suppliers AS sup
	  ON sup.supplier_id = prod.supplier_id
GROUP BY prod.category_id, sup.country
HAVING prod.category_id NOT IN (SELECT category_id FROM categories where category_name like 'Confections');
  
--10)SELECT ... FROM ... JOIN ... WHERE ... GROUP BY ... HAVING ... (SELECT...)
--qtd de produtos por categoria de cada pais menos brazil
 SELECT  sup.country, prod.category_id, count(*) as qtd
	FROM products AS prod
	JOIN suppliers AS sup
	  ON sup.supplier_id = prod.supplier_id
   WHERE sup.country not like 'brazil'
   GROUP BY sup.country, prod.category_id
  having prod.category_id NOT IN (SELECT category_id FROM categories where category_name like 'Confections');
  



  