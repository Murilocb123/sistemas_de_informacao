program tListaPonteiro;
uses crt, lista_string;

var lista:tListaPonteiro;
    op, posi:integer;
    valor:tipoInf;


begin
    inicializarListaString(lista);
    writeln('--------------------Bem vindo a lista ------------------');
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
                inserirNaListaString(valor,lista);
            end;
            2:begin
                writeln('Digite a posicao a ser removida');
                readln(posi);
                removerDaListaStringPorPosicao(posi,lista);
            end;
            3:escreverListaString(lista);
        end;
        clrscr;
    end;
end.