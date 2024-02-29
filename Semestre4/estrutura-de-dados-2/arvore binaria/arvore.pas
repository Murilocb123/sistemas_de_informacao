program ArvoreBinaria;
type
PtrNodoArvBin = ^NodoArvBin;
NodoArvBin = Record
  Conteudo:Integer;
  ArvEsq,ArvDir,Pai:PtrNodoArvBin;
End;
Procedure PreOrdem (Raiz: PtrNodoArvBin);
begin
  if raiz &lt;&gt; nil then begin
    write(raiz^.conteudo, &#39;-&#39;);
    PreOrdem(Raiz^.Arvesq);
    PreOrdem(Raiz^.Arvdir);
  end;
end;
Procedure EmOrdem (Raiz: PtrNodoArvBin);
begin
  if raiz &lt;&gt; nil then begin
    EmOrdem(Raiz^.Arvesq);
    write(raiz^.conteudo, &#39;-&#39;);
    EmOrdem(Raiz^.Arvdir);
  end;
end;
Procedure PosOrdem (Raiz: PtrNodoArvBin);
begin
  if raiz &lt;&gt; nil then begin
    PosOrdem(Raiz^.Arvesq);
    PosOrdem(Raiz^.Arvdir);
    write(raiz^.conteudo, &#39;-&#39;);
  end;
end;

procedure InicializaArvBin (var Raiz:PtrNodoArvBin);
begin
  Raiz:=Nil;
end;
Procedure MostraNodosFolha (Raiz: PtrNodoArvBin);
begin
  if raiz &lt;&gt; nil
  then begin
    if (Raiz^.ArvEsq = NIL) and (Raiz^.ArvDir = NIL)
    then write(raiz^.conteudo, &#39;-&#39;);
    MostraNodosFolha(Raiz^.Arvesq);
    MostraNodosFolha(Raiz^.Arvdir);
    
  end;
end;
procedure ApagaArvBin (Raiz:PtrNodoArvBin);
begin
  if raiz &lt;&gt; nil
  then begin
    ApagaArvBin(Raiz^.ArvEsq);
    ApagaArvBin(Raiz^.ArvDir);
    Dispose(Raiz);
  end;
end;
procedure ContaNodos (Raiz:PtrNodoArvBin;var Cont:Integer);
begin
  if Raiz &lt;&gt; nil
  then begin
    inc(cont);
    ContaNos(Raiz^.ArvEsq,Cont);
    ContaNos(Raiz^.ArvDir,Cont);
  end;
end;
procedure SomaNodos (Raiz:PtrNodoArvBin;var Soma:Integer);
begin
  if raiz &lt;&gt; nil
  then begin
    soma:=soma+Raiz^.Conteudo;
    SomaNodos(Raiz^.ArvEsq,Soma);
    SomaNodos(Raiz^.ArvDir,Soma);
  end;
end;
function PesquisaArvBinPesq (Raiz:PtrNodoArvBin;x:Integer):PtrNodoArvBin;
var Ptr:PtrNodoArvBin;
begin
  ptr:=Raiz;
  while (ptr &lt;&gt; nil) and (ptr^.conteudo &lt;&gt; x) do
  if x &gt; ptr^.conteudo
  then ptr:=ptr^.ArvDir
  else p
  tr:=ptr^.ArvEsq;
  PesquisaArvBinPesq:=ptr;
end;
function MenorValor (Raiz:PtrNodoArvBin):PtrNodoArvBin;
begin
  if Raiz^.ArvEsq &lt;&gt; nil
  then MenorValor:=MenorValor(Raiz^.ArvEsq)
  else MenorValor:=Raiz;
end;
function MaiorValor (Raiz:PtrNodoArvBin):PtrNodoArvBin;
begin
  if Raiz^.ArvDir &lt;&gt; nil
  then MaiorValor:=MaiorValor(Raiz^.ArvDir)
  
  else MaiorValor:=Raiz;
end;

function Nivel (Arv: PtrNodoArvBin; valor,n: Integer; var achou: boolean): integer;
begin
if not achou
then if arv &lt;&gt; nil
then if arv^.info = valor
then begin
achou := true;
Nivel := n;
end
else begin
Nivel := Nivel(arv^.Arvesq, valor, n + 1, achou);
if not achou
then Nivel := Nivel(arv^.Arvdir, valor, n + 1, achou);
end
else nivel := -1;
end;
function Maior(a,b:integer):integer;
begin
if a &gt; b
then Maior := a
else Maior := b;
end;
function Altura (raiz:PtrNodoArvBin):integer;
begin
if raiz = NIL
then Altura := -1
else Altura := 1+Maior(altura(raiz^.ArvEsq),altura(raiz^.ArvDir));
end;
Procedure MostraArvore (Raiz:PtrNodoArvBin;lin,col,colanterior:integer);
begin
if Raiz &lt;&gt; nil
then begin
MostraArvore(Raiz^.ArvEsq,lin+1,col-abs(colanterior-col)div 2,col);
gotoxy(col,lin);write(Raiz^.Conteudo);
MostraArvore(Raiz^.ArvDir,lin+1,col+abs(colanterior-col)div 2,col);
end;
end;
function MaiorCaminho (Raiz:PtrNodoArvBin):String;
begin
if raiz = Nil
then MaiorCaminho:=&#39;&#39;
else if altura(raiz) = 0
then MaiorCaminho:=&#39;&#39;
else if altura(raiz^.ArvEsq) &gt; altura(raiz^.ArvDir)
then MaiorCaminho:=&#39;E&#39; + MaiorCaminho(raiz^.ArvEsq)
else MaiorCaminho:=&#39;D&#39; + MaiorCaminho(raiz^.ArvDir);
end;