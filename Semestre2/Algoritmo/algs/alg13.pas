Program Pzim ;
var m1:array[1..2,1..2] of integer;
		v:array[1..2] of integer;
		i,a: integer;
Begin
	for i := 1 to 2 do
 	begin
 		for a := 1 to 2 do
  	begin
    	m1[a,i] := random(100)-10;
    	v[i]:= v[i]+m1[a,i];
		 end;
 	end;
	clrscr;
	
	for i := 1 to 2 do
 	begin
 		for a := 1 to 2 do
  	begin
  			gotoxy(i*8+5, a*2+1);
    		write(m1[i,a]);
    		gotoxy (i*8+25, a*2+1);    
		 end;
		 gotoxy (a*8+25, i*2+1);
		 Writeln('Linha ', i ,': ',v[i]);
 	end;  
End.