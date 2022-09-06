# 🎨CSS(***C***ascadinng ***S***tyle ***S***heets)

## Aula 09/05

- Padronização da utilizando de tags HTML;
- Exemplo :
```html
    <style>
        p{
          color: red;  
        }
    </style>
```
- Utilização do mesmo arquivo CSS para diversos arquivos HTML.
- Formas de utilização do css:
    - CSS definido em tags(Mais prioritarios) - **EVITAR USAR NÃO É UM BOM HABITO** - **(inline)**; 
    - CSS definido dentdo do cabecalho do documento **(INCORPORADO)**;
    - CSS em arquivo externo;
    - Padrão do navegador(Menos prioritario).
- Comentario:
```css
/* Comentario */
```
- !important (ignora toda a cascata);



### Sintaxe
```css
seletor {
    propriedade:valor;
}
```
### Seletores
- " . " significa classe, que **pode ser repetida**
- " # " Significa id, **não pode ser repetido**