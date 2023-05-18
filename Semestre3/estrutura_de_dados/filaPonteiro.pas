program listaPonteiro;

type
filaPonteiro = ^f;
f = record
    data:string;
    prox: filaPonteiro;
end;

var fila:filaPonteiro;
    op:integer;
    valor:string;

procedure inicializa(var fila:filaPonteiro);
begin
    fila:=NIL;
end; 

{Inserção de dados na pilha}
procedure insert(var fila:filaPonteiro; inf:string);
var aux,aux2: filaPonteiro;
begin
    new(aux);
    if (aux=nil) then
        writeln('Memoria cheia')
    else 
    begin
        aux2:=fila;
        while aux2^.prox <> NIL do
            aux2 := aux2^.prox;
        aux^.data:=inf;
        aux^.prox:=NIL;
        if (fila=NIL) then
            fila:=aux
        else
            aux2^.prox:=aux;
    end;
end;

{procedimento para remover o primeiro elemento da fila}
procedure remove(var fila:filaPonteiro);
var aux:filaPonteiro;
begin
    if (fila=NIL) then
        writeln('Fila vazia')
    else
    begin
        aux:=fila;
        fila:=fila^.prox;
        dispose(aux);
    end;
end;

{procedimento para imprimir a fila}
procedure imprime(fila:filaPonteiro);
var aux:filaPonteiro;
begin
    if (fila=NIL) then
        writeln('Fila vazia')
    else
    begin
        aux:=fila;
        while (aux<>NIL) do
        begin
            writeln(aux^.data);
            aux:=aux^.prox;
        end;
    end;
    readkey;
end;

begin
    inicializa(fila);
    writeln('--------------------Bem vindo a fila ------------------');

    while(op<>4) do
    begin
        writeln('1 - Inserir');
        writeln('2 - Remover');
        writeln('3 - Imprimir');
        writeln('4 - Sair');
        readln(op);
        case op of
            1:begin
                writeln('Digite o elemento a ser inserido');
                readln(valor);
                insert(fila,valor);
            end;
            2:remove(fila);
            3:imprime(fila);
        end;
        clrscr;
    end;
end.