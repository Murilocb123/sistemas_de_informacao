program listaPonteiro;

type
pilhaPonteiro = ^p;
p = record
    data:string;
    prox: pilhaPonteiro;
end;

var pilha:pilhaPonteiro;
    op:integer;
    valor:string;

procedure inicializa(var pilha:pilhaPonteiro);
begin
    pilha:=NIL;
end; 

{Inserção de dados na pilha}
procedure insert(var pilha:pilhaPonteiro; inf:string);
var aux,aux2: pilhaPonteiro;
begin
    new(aux);
    if (aux=nil) then
        writeln('Memoria cheia')
    else 
    begin
        aux2:=pilha;
        while aux2^.prox <> NIL do
            aux2 := aux2^.prox;
        aux^.data:=inf;
        aux^.prox:=NIL;
        if (pilha=NIL) then
            pilha:=aux
        else
            aux2^.prox:=aux;
    end;
end;

{procedimento para remover o ultimo elemento da pilha
e liberar a memoria alocada para ele}
procedure remove(var pilha:pilhaPonteiro);
var aux,aux2:pilhaPonteiro;
begin
    if (pilha=NIL) then
        writeln('Pilha vazia')
    else
    begin
        aux:=pilha;
        aux2:=pilha;
        while (aux^.prox<>NIL) do
        begin
            aux2:=aux;
            aux:=aux^.prox;
        end;
        if (aux=pilha) then
            pilha:=NIL
        else
            aux2^.prox:=NIL;
        dispose(aux);
    end;
end;


{procedimento para imprimir a pilha}
procedure imprime(pilha:pilhaPonteiro);
var aux:pilhaPonteiro;
begin
    if (pilha=NIL) then
        writeln('Pilha vazia')
    else
    begin
        aux:=pilha;
        while (aux<>NIL) do
        begin
            writeln(aux^.data);
            aux:=aux^.prox;
        end;
    end;
    readkey;
end;

begin
    inicializa(pilha);
    writeln('--------------------Bem vindo a pilha ------------------');

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
                insert(pilha,valor);
            end;
            2:remove(pilha);
            3:imprime(pilha);
        end;
        clrscr;
    end;
end.