Program Pzim;
type
aluno = record
		disciplina:Array[1..5]of string;
		semestre:integer;		
end;
var murilo:aluno;
		i:integer;
Begin 
	Writeln('Defina o semestre');
	read(murilo.semestre);
	for i:=1 to 5 do 
	begin
  	read(murilo.disciplina[i]);
	end 
End.