Program PilhaComParametros ;

const
	max = 5;
type
	vetor= array[1..max]of integer;
var ultima_posi, op, elem: integer;
		pil: vetor;

	
procedure inicializa(var value:integer);
begin
	value:=0;
end;

procedure ler_elemento(var elemento:integer);
begin
  writeln('Digite o elemento');
  read(elemento)
end;
	
procedure inserir(var pilha:vetor; var posicao,value:integer);
begin
  if (posicao < max) then
  begin
    posicao:=posicao+1;
    pilha[posicao]:= value;
  end
  else
  Writeln('Posicao max do vetor atingida');
end;

procedure remover(var pilha:vetor; var posicao:integer);
var i,el:integer;
begin
  if(posicao > 0) then
  begin
  	el:=pilha[posicao];
    posicao:=posicao-1;
    writeln('Elemento removido ', el);
  end
  else
  writeln('Vetor ja está vazio')
end;


procedure proximo_ele_removido(pilha:vetor;posi:integer);
begin
  if posi>0 then
      writeln ('Próximo elemento a ser removido ',pilha[posi])
  else 
      writeln('Pilha vazia');
end;


procedure escrever(pilha:vetor;posicao:integer);
var i :integer;
begin
  if(posicao <> 0) then
  for i := 1 to posicao do
  begin
    writeln(i,' - [',pilha[i],']')
  end
  else
  writeln('Vetor vazio');
end;

Begin
	inicializa(ultima_posi);
  op:=0;
  writeln('~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~PILHA~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~') ;
  while (op <> 5) do begin
  	clrscr;
    writeln('-----------------------------------------------------------------------');
    writeln('| 1 - Inserir | 2 - Remover | 3 - Consultar | 4 - Escrever | 5 - Sair |');
    writeln('-----------------------------------------------------------------------');
    read(op);
    if (op = 1 ) then
    begin
      ler_elemento(elem);
    	inserir(pil, ultima_posi,elem);
    end
		else if (op = 2) then
    	remover(pil, ultima_posi)
    else if (op = 3) then
    	proximo_ele_removido(pil, ultima_posi)
    else if (op = 4) then
    	escrever(pil, ultima_posi);
    readkey;
	end;
  writeln('~~~~~~~~~~~~~~~~~~~~~~Adeus Humano~~~~~~~~~~~~~~~~~~~~~') ;
End.