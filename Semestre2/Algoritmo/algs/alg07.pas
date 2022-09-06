Program Pzim ;
var frase:string;
		vetor: array[1..200] of string;
		vetorAscii: array[1..255] of integer ;
		i,cont: integer;
Begin
	Writeln('Insira a frase');
	read(frase);
	i := 1;
	
	while (i < 200)) do begin
		  vetorAscii[ord(frase[i])] = vetorAscii[ord(frase[i])]+1;
			i := i+1; 
	end;
		
		i := i+1;
 	end;
 	  if (cont = 5) then
 	  	writeln('Possui todas as vogais')
		else
		 writeln('nao possui') ;  
End.