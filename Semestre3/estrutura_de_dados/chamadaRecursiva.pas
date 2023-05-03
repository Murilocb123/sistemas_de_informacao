Program Pzim ;
var n1, n2, controlador: integer;

function maiorDivisor(num1, num2:integer):integer;
var i: integer;
begin
		controlador:= controlador+1;
   	if (((num1 mod (num1 - (controlador-1)))=0) and ((num2 mod (num1 - (controlador-1)))=0)and (controlador = num1)) then 
   		maiorDivisor	:= (num1 - controlador)
		else    
   		maiorDivisor := maiorDivisor(n1,n2) 
end;

Begin
	read(n1,n2);
	writeln('Maior divisor é = ', maiorDivisor(n1,n2));
End.