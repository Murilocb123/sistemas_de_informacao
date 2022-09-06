Program alg02;
var intVetor: array[1..10] of integer;
		a1, a2, aux,aux1, aux2:integer;
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
End.