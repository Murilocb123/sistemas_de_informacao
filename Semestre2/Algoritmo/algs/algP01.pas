Program algP01;
type
	vetor = array[1..100] of real;
var vet:vetor;
		n,i:integer;
		media:real;
		
procedure leia(var vetAux:vetor; tam :integer);
begin
	Writeln('Escreva os valores do vetor');
 	for i := 1 to tam do
  begin
    read(vetAux[i]);
  end;
end;
procedure caclcularMedia(vetAux:vetor;tam:integer; var media:real);
var soma:real;
begin
	for i := 1 to tam do
	begin
  	soma:=vetAux[i]+soma;
	end;
	media:=soma/tam; 
end;

//-------------------------Main---------------------------
Begin
	 writeln('Escreva o tamanho?');
	 readln(n);
	 leia(vet, n);
	 caclcularMedia(vet,n,media);
	 writeln(media);
End.