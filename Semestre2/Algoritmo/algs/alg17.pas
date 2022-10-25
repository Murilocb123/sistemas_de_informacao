Program Pzim ;
type 
time=record
		 nome:String; 
		 j:string; //jogos
		 v:integer; //Vitorias
		 e:integer; //Empates
		 d:integer; //Derrotas
		 pg:integer;//Pontos ganhos
		 pp:integer;//Pontos perdidos
		 gm:integer;//gols marcados
		 gs:integer;//gols sofridos
		 sg:integer;//saldos de gols
end;
 timeArray = array[1..2]of time;
var times:timeArray;
		i:integer;
Begin
	for i := 1 to 2 do
	with times[i] do
 	begin
  	writeln('Informe o nome do time');
		read(nome);
		writeln('Informe os jogos, as vitorias, os empates e as derrotas');
		read(j, v,e,d);
		writeln('os gols marcados e sofridos');
		read(gm,gs);
		pg:= v*3+e;
		pp:= j*3-pg;
  	sg := gm-gs;
 	 	writeln(j);
 	 	writeln(v);
  	writeln(e);
    writeln(e);
  	writeln(d);
  	writeln(pg);
    writeln(pp);
    writeln(gm);
    writeln(gs);
    writeln(sg);
	 end;
End.