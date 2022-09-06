Program alg02;
var intVetor: array[0..10] of integer;
		a1, a2, aux:integer;
Begin
	Writeln('Informe os 10 valores do vetor:');
	for a1 := 0 to 9 do
 	begin
  	intVetor[a1] := random(100)-50;
 	end;
 	
 	
for a1 := 0 to 8 do
 	begin
 	for a2 := 0 to 8 do
 		begin
 			if intVetor[a2] > intVetor[a2+1] then
 			begin
 					aux := intVetor[a2];
 					intVetor[a2] := intVetor[a2+1];
 					intVetor[a2+1] := aux;
 			end;
		 end;
 	end;
 		
 		
 		
 	for a1 := 0 to 9 do
  begin
    writeln(a1,' = ',intVetor[a1]);
  end;
End.