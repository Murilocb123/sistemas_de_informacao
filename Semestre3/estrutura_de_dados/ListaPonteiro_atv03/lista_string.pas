unit lista_string;

interface
type tipoInf = string;
type tListaPonteiro = ^l;
l = record
    dado:tipoInf;
    prox:tListaPonteiro;
end;

procedure escreverListaString(lista:tListaPonteiro);
function removerDaListaStringPorPosicao(posicao: integer; var lista: tListaPonteiro): tListaPonteiro;
procedure inserirNaListaString(valor: tipoInf;var lista: tListaPonteiro);
procedure inicializarListaString(var lista: tListaPonteiro);

implementation
//Procedimentos
procedure escreverListaString(lista: tListaPonteiro);
var aux:tListaPonteiro;
    posi:integer;
begin
    if (lista=NIL) then
        writeln('Lista vazia')
    else
    begin
        aux:=lista;
        while (aux<>NIL) do
        begin
            posi:=posi+1;
            writeln(posi ,' - ',aux^.dado);
            aux:=aux^.prox;
        end;
    end;
    readkey;
end;

function removerDaListaStringPorPosicao(posicao: integer; var lista: tListaPonteiro): tListaPonteiro;
var aux, anterior:tListaPonteiro;
    i:integer;
begin
    if (lista=NIL) then
        writeln('Lista vazia')
    else
    begin
        aux:=lista;
        anterior:=lista;
        i:=1;
        while (aux<>NIL) and (i<posicao) do
        begin
            anterior:=aux;
            aux:=aux^.prox;
            i:=i+1;
        end;
        if (aux=NIL) then
        begin
            writeln('Posicao nao encontrada');
            readkey;
        end
        else
        begin
            if (aux=lista) then
                lista:=lista^.prox
            else
                anterior^.prox:=aux^.prox;
            dispose(aux);
        end;
    end;
    removerDaListaStringPorPosicao:=lista;
end;  

{Insere na lista de forma ordenada, considerando que ou será inserido no inicio ou depois de um elemento}
procedure inserirNaListaString(valor: tipoInf; var lista: tListaPonteiro);
var atual, anterior, newValue: tListaPonteiro;
    bExiste: boolean;
begin
  new(newValue);
  if (newValue=NIL) then
      writeln('Memoria cheia')
  else 
  begin
      newValue^.dado:=valor;
      inicializarListaString(newValue^.prox);
      if NOT(lista=NIL) and NOT (lista^.dado > newValue^.dado) then
      begin
        atual:=lista;
        while (atual<>NIL) and (atual^.dado <= newValue^.dado) and not(bExiste) do
        begin
          if (atual^.dado = newValue^.dado) then
            bExiste:=true;
          anterior:=atual;
          atual:=atual^.prox;
        end;
          if bExiste then
          begin
            writeln('Valor ja existe na lista');
            dispose(newValue);
            readkey;
          end
          else 
          begin
            anterior^.prox:=newValue;
            newValue^.prox:=atual;
          end;
        end
      else //insere no inicio ou quando a lista esta vazia
      begin
        newValue^.prox:=lista;
        lista:=newValue;
      end;
    end;
end;



procedure inicializarListaString(var lista: tListaPonteiro);
begin
  lista:=NIL;
end;

end.