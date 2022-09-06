Program Pzim ;
var texto:string;
		contA,contO, i, tp:integer;
Begin
   writeln('Informe a Frase');
	 read(texto);
	 for i := 1 to length(texto)-1	 do
    if (texto[i]='a') or (texto[i]='A') then
			contA:=contA+1
		else if(texto[i]='o') or (texto[i]='O')  then
			contO :=contO+1
		else if(texto[i]='.')    
		    
			
		writeln('O:',contO,' A:',contA) ;  
End.