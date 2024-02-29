program arvore_inteligente_akinator;

uses crt;

type
arvore = ^no;
no = record
  info: string;
  sim: arvore;
  nao: arvore;
end;

var
raiz: arvore;
opcao: integer;
resposta: string;


procedure criar(var base, sim, nao: arvore; info: string);
begin
  if base = nil then
  begin
    new(base);
    base^.info := info;
    base^.sim := sim;
    base^.nao := nao;
  end
  
end;

procedure inserir(var base, sim, nao: arvore);
begin
  if base <> nil then
  begin
    base^.sim := sim;
    base^.nao := nao;
  end;
end;

procedure escrever_pergunta(pergunta: string; var resposta: integer);
begin
  writeln('-----------DIGITE O NUMERO---------------');
  writeln(pergunta);
  writeln('1 - Sim');
  writeln('2 - Nao');
  writeln('-----------------------------------------');
  readln(resposta);
end;

procedure escrever_resposta(resposta: string; var correta: integer);
begin
  writeln('-----------DIGITE O NUMERO---------------');
  writeln('A resposta e: ', resposta);
  writeln('1 - Sim');
  writeln('2 - Nao');
  writeln('-----------------------------------------');
  readln(correta);
end;

procedure resposta_errada(var raiz: arvore);
var
resposta_errada, nova_pergunta, nova_resposta: string;
nova_pergunta_nao, nova_resposta_sim, null: arvore;
begin
  writeln('Ohhh nao, errei!');
  writeln('Qual era a cidade que voce pensou?');
  readln(nova_resposta);
  writeln('Qual pergunta voce faria para diferenciar ', nova_resposta, ' de ', raiz^.info, '?');
  readln(nova_pergunta);
  resposta_errada := raiz^.info;
  raiz^.info := nova_pergunta;
  nova_pergunta_nao := nil;
  nova_resposta_sim := nil;
  null := nil;
  criar(nova_pergunta_nao, null, null, resposta_errada);
  criar(nova_resposta_sim, null, null, nova_resposta);
  inserir(raiz, nova_resposta_sim, nova_pergunta_nao);
end;


procedure printar_arvore(raiz: arvore);
var
resposta: integer;
begin
  if raiz <> nil then
  begin
    
    //verifica se e diferente de folha
    if (raiz^.sim <> nil) and (raiz^.nao <> nil) then
    begin
      escrever_pergunta(raiz^.info, resposta);
      if resposta = 1 then
      begin
        printar_arvore(raiz^.sim);
      end
      else
      begin
        printar_arvore(raiz^.nao);
      end;
    end
    else
    begin
      escrever_resposta(raiz^.info, resposta);
      if resposta = 1 then
      begin
        writeln('Acertei!');
      end
      else
      begin
        resposta_errada(raiz);
      end;
    end;
  end;
end;

procedure inicializar_arvore(var raiz: arvore);
var sim,nao, sim_resposta, nao_resposta: arvore;
begin
  raiz := nil;
  sim := nil;
  nao := nil;
  sim_resposta := nil;
  nao_resposta := nil;
  
  criar(sim_resposta, sim, sim, 'Floripa');
  criar(nao_resposta, sim, sim, 'Bombinhas');
  criar(sim, sim_resposta, nao_resposta,'E uma ilha?');
  sim_resposta := nil;
  nao_resposta := nil;

  criar(sim_resposta, nao, nao, 'Rio do Sul');
  criar(nao_resposta, nao, nao,'Blumenau');
  criar(nao,sim_resposta, nao_resposta,'Pertence ao alto vale?');
  
  criar(raiz, sim, nao, 'E uma cidade litorania?');
end;

procedure printar_arvore_teste_com_seu_nivel(raiz: arvore; nivel: integer; resposta: integer);
begin
  if raiz <> nil then
  begin
    writeln('Nivel: ', nivel);
    if (resposta = 1) then
    begin
      writeln('Sim: ');
    end
    else if (resposta = 2) then
    begin
      writeln('Nao: ');
    end;
    writeln(raiz^.info);
    printar_arvore_teste_com_seu_nivel(raiz^.sim, nivel + 1, 1);
    printar_arvore_teste_com_seu_nivel(raiz^.nao, nivel + 1, 2);
  end;
end;

procedure iniciar_akinetor(var raiz: arvore);
var opcao: integer;
begin
  inicializar_arvore(raiz);
  while opcao <> 3 do
  begin
    writeln('-----------DIGITE O NUMERO---------------');
    writeln('1 - Continuar');
    writeln('2 - Testar');
    writeln('3 - Sair');
    writeln('-----------------------------------------');
    readln(opcao);
    if opcao = 2 then
    begin
      opcao := 1;
      printar_arvore_teste_com_seu_nivel(raiz, opcao, 0);
    end
    else if opcao = 1 then
    begin
      printar_arvore(raiz);
    end;
    writeln('Pressione qualquer tecla para continuar...(menos o ESC, pgup, pgdn, etc)');
    readkey;
    clrscr;
  end;
  
end;

begin
  iniciar_akinetor(raiz);
end.

