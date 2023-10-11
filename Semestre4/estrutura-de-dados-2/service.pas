unit service;
    
interface
type grafoRecord = record
    values:Array[1..99, 1..99] of integer;
    max:integer;
end;

procedure initGrafo(var g: grafoRecord);
procedure setValuesGrafo(var g: grafoRecord);
procedure printAllInfo(g: grafoRecord);
procedure printGrafo(g: grafoRecord);
procedure verifyMultigrafo(g: grafoRecord);
procedure verifyClique(g: grafoRecord);
procedure verifyRegular(g: grafoRecord);
procedure verifyConexo(g: grafoRecord);


implementation
procedure initGrafo(var g: grafoRecord);
begin
    Writeln('Insira o numero maximo de vertices');
    readln(g.max);
End;
procedure setValuesGrafo(var g: grafoRecord);
var i,j,value:integer;
begin
initGrafo(g);
    for i:=1 to g.max do
        for j:=1 to g.max do
        begin
            clrscr;
            Writeln('Insira o valor da aresta ',i,' - ',j,':');
            readln(value);
            if value < 0 then
                value:=0;
            g.values[i,j]:=value;
        end;
end;

procedure printGrafo(g: grafoRecord);
var i,j, line:integer;
begin
    write(' |');
    for i:=1 to g.max do
        write(i,' ');
    writeln();
    for i:=1 to g.max do
        write('--');
    writeln();
    for i:=1 to g.max do
    begin
        write(i,'|');
        for j:=1 to g.max do
            write(g.values[i,j],' ');
        writeln();
    end;
    readkey;
end;

procedure printAllInfo(g: grafoRecord);
var i,j:integer;
begin
    printGrafo(g);
    verifyMultigrafo(g);
    verifyClique(g);
    verifyRegular(g);
    verifyConexo(g);
    readkey;
end;

procedure verifyMultigrafo(g: grafoRecord);
var i,j:integer;
    isMultigrafo:boolean;
begin
    for i:=1 to g.max do begin
        for j:=1 to g.max do
            if ((g.values[i,j] > 1) or ((i = j) and (g.values[i,j] = 1))) then begin
                isMultigrafo:=true;
                break;
            end;
        if isMultigrafo then
            break;
    end;

    if isMultigrafo then
        writeln('O grafo e um multigrafo')
    else
        writeln('O grafo NAO e um multigrafo');
end;

procedure verifyClique(g: grafoRecord);
var i,j:integer;
    isClique:boolean;
begin
    isClique:=true;
    for i:=1 to g.max do begin
        for j:=1 to g.max do
            if (i = j) and (g.values[i,j] <> 0) then begin
                isClique:=false;
                break;
            end;
        if not isClique then
            break;
    end;
    if isClique then
        writeln('O grafo e um clique')
    else
        writeln('O grafo NAO e um clique');
end;

procedure verifyRegular(g: grafoRecord);
var i,j, grau, grauAux:integer;
    isRegular:boolean;
begin
    isRegular:=true;
    grau:=0;
    grauAux:=0;
    for i:=1 to g.max do begin
        for j:=1 to g.max do
                grau:=grau + g.values[i,j];
        if grauAux = 0 then
            grauAux:=grau
        else if grau <> grauAux then begin
            isRegular:=false;
            break;
        end;
        grau:=0;
    end;
    if isRegular then
        writeln('O grafo e regular')
    else
        writeln('O grafo NAO e regular');
end;

procedure verifyConexo(g: grafoRecord);
var i,j, grau:integer;
    isConexo:boolean;
begin
    isConexo:=true;
    for i:=1 to g.max do begin
        for j:=1 to g.max do
            if (i <> j) then 
                grau:=grau + g.values[i,j];
        if grau=0 then begin
            isConexo:=false;
            break;
        end;
        grau:=0;
    end;
    if isConexo then
        writeln('O grafo e conexo')
    else
        writeln('O grafo NAO e conexo');
end;


end.