Program FilaComParametros ;

const
	max = 5;
type
	vetor= array[1..max]of integer;
var ultima_posi, op, elem: integer;
		fil: vetor;

	
procedure inicializa(var value:integer);
begin
	value:=0;
end;

procedure ler_elemento(var elemento:integer);
begin
  writeln('Digite o elemento');
  read(elemento)
end;
	
procedure inserir(var fila:vetor; var posicao,value:integer);
begin
  if (posicao < max) then
  begin
    posicao:=posicao+1;
    fila[posicao]:= value;
  end
  else
  Writeln('Posicao max do vetor atingida');
end;

procedure remover(var fila:vetor; var posicao:integer);
var i,el:integer;
begin
  if(posicao > 0) then
  begin
    posicao:=posicao-1;
    el:=fila[1];
    for i := 1 to posicao do
    begin
      fila[i]:=fila[i+1];
    end;
    writeln('Elemento removido ', el);
  end
  else
  writeln('Vetor ja está vazio')
end;


procedure proximo_ele_removido(fila:vetor;posi:integer);
begin
  if posi>0 then
      writeln ('Próximo elemento a ser removido ',fila[1])
  else 
      writeln('Fila vazia');
end;


procedure escrever(fila:vetor;posicao:integer);
var i :integer;
begin
  if(posicao <> 0) then
  for i := 1 to posicao do
  begin
    writeln(i,' - [',fila[i],']')
  end
  else
  writeln('Vetor vazio');
end;

Begin
	inicializa(ultima_posi);
  op:=0;
  writeln('~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~FILA~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~') ;
  while (op <> 5) do begin
  	clrscr;
    writeln('-----------------------------------------------------------------------');
    writeln('| 1 - Inserir | 2 - Remover | 3 - Consultar | 4 - Escrever | 5 - Sair |');
    writeln('-----------------------------------------------------------------------');
    read(op);
    if (op = 1 ) then
    begin
      ler_elemento(elem);
    	inserir(fil, ultima_posi,elem);
    end
		else if (op = 2) then
    	remover(fil, ultima_posi)
    else if (op = 3) then
    	proximo_ele_removido(fil, ultima_posi)
    else if (op = 4) then
    	escrever(fil, ultima_posi);
    readkey;
	end;
  writeln('~~~~~~~~~~~~~~~~~~~~~~Adeus Humano~~~~~~~~~~~~~~~~~~~~~') ;
End.