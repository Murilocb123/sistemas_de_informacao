Program Pzim ;
const n = 4;
var matriz:array[1..4,1..4] of integer;
		x,y:integer;
Begin
	for x := 1 to n do
 	  for y := 1 to n do
    begin
    	matriz[x,y] := random(9);
    end;
    clrscr;
    for x := 1 to n do
    	begin
      	for y := 1 to n do
      		if ( x+y = 5 ) then 
        		write('|',matriz[x,y])
        	else
        		write('|',' ');
        writeln('|');
			end
End.