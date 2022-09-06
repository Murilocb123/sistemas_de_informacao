Program alg01;
var intVetor: array[0..10] of integer;
		i, cont:integer;
		media :real;
Begin
	Writeln('Informe os 10 valores do vetor:');
	for i := 0 to 9 do
 	begin
  	read(intVetor[i]);
  	media := media+intVetor[i];
  	if (intVetor[i] < i) then
			cont:= cont+1;
 	end;
 	write('Media: ' ,media/10);
 	write('Menores que seus indices: ',cont);
End.