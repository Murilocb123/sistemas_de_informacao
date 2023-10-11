program main;
uses crt, service;
var grafo:grafoRecord;
    op:integer;


Begin
while op <> 13 do
begin
    writeln('1 - Inserir');
    writeln('2- Imprimir');
    writeln('3 - Verificar');
    writeln('13 - Sair do programa');
    readln(op);
    case(op) of
        1: setValuesGrafo(grafo);
        2: printGrafo(grafo);
        3: printAllInfo(grafo);
    end;
    clrscr;
end;
    
End.