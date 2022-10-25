# Aula 26/09

- **"!important"** decide qual a regra de estilo deve ser aplicada pela questão de que o que está escrito depois é mais prioritario do que está antes. Nesse ponto que entra a questão do !important
- EX.:
```css
    p{font-size:14px !important;}

 ```

 - @font-face usado para carregar fontes que nao estão no computador do usuario 
 @font-face{
    font-family: fonteMeuSite;
    src:url(fonts/sansation_light.woff);
 }
 
 - Media queries: foram adicionadas a CSS3. É utilizado @media para incluir um bloco de propriedades CSS somente se uma determinada condição for verdadeira.
 - criação de breakpoints ex.:
 
```css
@media only screen and(max-width:500px){
    body{
        background-color: pink;
    }
}

```