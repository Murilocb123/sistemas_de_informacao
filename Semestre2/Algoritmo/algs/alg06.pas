Program Pzim ;
var frase:string;
		vetor: array[1..5] of boolean;
		i,cont: integer;
Begin
	Writeln('Insira a frase');
	read(frase);
	i := 1;
	while ((frase[i] <> '.') and (i < 100)) do begin
  	if (((frase[i] = 'a') or (frase[i]='A')) and (vetor[1]<> true))then
  	begin
  		vetor[1]:= true;
  	  cont := cont +1;
		end
		else if (((frase[i] = 'e') or (frase[i]='E')) and (vetor[2]<> true))then
  	begin
  		vetor[2]:= true;
  		cont := cont +1;
  	end
		else if (((frase[i] = 'i') or (frase[i]='I')) and (vetor[3]<> true))then
  	begin
  		vetor[3]:= true;
  		cont := cont +1;
  	end
		else if (((frase[i] = 'o') or (frase[i]='O')) and (vetor[4]<> true))then
  	begin
  		vetor[4]:= true;
  		cont := cont +1;
  	end
		else if (((frase[i] = 'u') or (frase[i]='U')) and (vetor[5]<> true))then
  	begin
  		vetor[5]:= true;
  		cont := cont +1;
  	end
  	else
  		i := 100;
		i := i+1;
 	end;
 	  if (cont = 5) then
 	  	writeln('Possui todas as vogais')
		else
		 writeln('nao possui') ;  
End.