Program alg02;
var intVetor: array[1..10] of integer;
		a1, a2, aux,aux1, aux2, indice,indiceAux, value:integer;
Begin
	Writeln('Informe os 10 valores do vetor:');
	for a1 := 1 to 10 do
 	begin
  	intVetor[a1] := random(100)-50;
 	end;
 	
	aux2 := 9; 	
	for a1 := 1 to 9 do
 		begin
 		for a2 := 1 to aux2 do
 			begin
 				if intVetor[a2] > intVetor[a2+1] then
 				begin
 					aux := intVetor[a2];
 					intVetor[a2] := intVetor[a2+1];
 					intVetor[a2+1] := aux;
 					aux1 := a2;
 				end
		 	end;
			aux2 := aux1-1;
			writeln('ok ',aux2);
	end;
	
 	for a1 := 1 to 10 do
  begin
    writeln(a1,' = ',intVetor[a1]);
  end;
  
  Writeln('Escreva o valor da pesquisa ou so olhe na tela mesmo');
	read(value);
	
  indice := 10;
  a1 := 1;
  indiceAux := (indice+a1) div 2;
  
  while (a1<= indice) do
  Begin
		if intVetor[indiceAux] = value then 
  	begin  	
			writeln('Encontrou na posição: ', indiceAux);
			a1 :=indice+1;			
		end			
		else if intVetor[indiceAux] >  value then
			indice :=indiceAux 	
		else
			a1 :=indiceAux + 1;
			
		indiceAux := (indice+a1) div 2;
		
		writeln('ini:', a1,' fim:',indice);	 	
	end;
End.