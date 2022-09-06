Program Pzim ;
var m1:array[1..4,1..4] of real;
		i,a,b: integer;
		aux:real;
Begin
	for i := 1 to 4 do
 	begin
 		for a := 1 to 4 do
  	begin
    	m1[i,a] := random(10);
		 end;
 	end;	
	for i := 1 to 4 do
 	begin
 		for a := 1 to 4 do
  	begin
    		write(' ',m1[i,a]:2:2,' ');
		 end;
			writeln('');
 	end;
 	writeln('');
	for i := 1 to 4 do
 		begin
		aux:=m1[i,i];
 			for a := 1 to 4 do
  		begin
    		write(' ',m1[i,a]/aux:2:2,' ');
			end;
		writeln('');
 	end;  
End.