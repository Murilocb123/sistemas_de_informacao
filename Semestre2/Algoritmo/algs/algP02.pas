Program Pzim;
var num1, num2:integer;
par:boolean;
sN:String;
procedure leiaNum(var auxNum1, auxNum2:integer);
begin
	writeln('Escreva dois numeros e diga se é impar ou par?');
	read(auxNum1,auxNum2);
end;
procedure isPar(num:integer; b:boolean; var str:String);
begin
	b := (((num)mod(2))=0);
	if(b)then
		str:='Sim'
	else
		str:='Nao'
end;

Begin
	leiaNum(num1,num2);
	isPar(num1, false, sN);
	writeln('Numero ',num1,' é par? ', sN);
	isPar(num2, false, sN);
	writeln('Numero ',num2,' é par? ', sN);
   	
End.