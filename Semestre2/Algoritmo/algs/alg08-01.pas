Program Pzim ;
const n = 4
var matriz:array[1..4,1..4] of string;
		x,y:integer;
Begin
	for x := 1 to n do
 	  for y := 1 to n do
    begin
    	writeln('Escreva o valor da linha: ', x,' coluno: ', y);
    	read(matriz[x,y]);
    end;
    clrscr;
    for x := 1 to n do
    	begin
      	for y := 1 to n do
        	write('|',matriz[x,y]);
        writeln('|');
			end
End.