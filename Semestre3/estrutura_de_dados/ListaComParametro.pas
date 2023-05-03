Program ListaComParametros ;

const
	max = 5;
type
	vetor= array[1..max]of integer;
var ultima_posi, op, elem: integer;
		lis: vetor;

	
procedure inicializa(var value:integer);
begin
	value:=0;
end;

procedure ler_elemento(var elemento:integer; mensagem:string);
begin
  writeln(mensagem);
  read(elemento)
end;
	
procedure inserir(var lista:vetor; var posicao,value:integer);
var i, j, aux: integer;
begin
  if (posicao < max) then
  begin
  	if (posicao = 0) then
  		lista[1]:=value
  	else
  	begin
  		j:=1;
    	for i := 1 to posicao do
    		if((value > lista[i])) then 
					 j:=i+1 ;
			for i:= posicao downto j do
				lista[i+1]:=lista[i];
			lista[j]:=value;
		end;
		posicao:=posicao+1;
  end
  else
  	Writeln('Posicao max do vetor atingida');
end;

procedure remover(var lista:vetor; var posicao:integer; posi:integer);
var i,el:integer;
begin
  if(posicao > 0) then
  begin
    posicao:=posicao-1;
    el:=lista[posi];
    for i := posi to posicao do
    begin
      lista[i]:=lista[i+1];
    end;
    writeln('Elemento removido ', el);
  end
  else
  writeln('Vetor ja está vazio')
end;

procedure escrever(lista:vetor;posicao:integer);
var i :integer;
begin
  if(posicao <> 0) then
  for i := 1 to posicao do
  begin
    writeln(i,' - [',lista[i],']')
  end
  else
  writeln('Vetor vazio');
end;



Begin
	inicializa(ultima_posi);
  op:=0;
  writeln('~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~lista~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~') ;
  while (op <> 4) do begin
  	clrscr;
    writeln('-----------------------------------------------------------------------');
    writeln('| 1 - Inserir | 2 - Remover |3 - Escrever | 4 - Sair |');
    writeln('-----------------------------------------------------------------------');
    read(op);
    if (op = 1 ) then
    begin
      ler_elemento(elem, 'informe o elemento');
    	inserir(lis, ultima_posi,elem);
    end
		else if (op = 2) then
		begin
			ler_elemento(elem, 'Informe a posica da lista a ser excluido');
    	remover(lis, ultima_posi, elem);
    end
    else if (op = 3) then
    	escrever(lis, ultima_posi);
    readkey;
	end;
  writeln('~~~~~~~~~~~~~~~~~~~~~~Adeus Humano~~~~~~~~~~~~~~~~~~~~~') ;
End.