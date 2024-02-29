<?php
    require_once 'htmlelement.php';

    class htmlTable extends HtmlElement {
        private $numColunas;
        private $numLinhas;
        private $headertable = [];

        private $dados;

        public function __construct() {
            //Esse será sempre o estilo inicial da nossa tabela
            $this->setStyle('');
        }

        public function setDados($aDados) {
            $this->dados = $aDados;
            //Obter o tamanho da tabela (colunas e linhas) baseado na estrutura da matriz de dados.
            if($this->dados != null){
                $this->setLinhas(sizeof($this->dados));
                $this->setColunas(sizeof($this->dados[0]));
            }
        }

        public function renderHtml() {
            return '<table '.$this->getClass().' ' . $this->getStyle() . '> '
            . '<thead><tr>' . $this->getHeaderTable() . '</tr></thead>'
            . '<tbody>' . $this->getLinhas() . '</tbody>'
            . '</table>';
            
        }

        public function getLinhas() {
            //Renderizar as linhas
            $linhas = '';
            for ($ilinhas=0; $ilinhas<$this->numLinhas; $ilinhas++) { 
                $linhas .= '<tr>' . $this->getColunas($ilinhas) . '</tr>';
            }
            return $linhas;            
        }

        public function getColunas($iLinha) {
            //Renderizar as colunas
            $colunas = '';
            $colunasNum = 0;
            if($this->dados != null){
            foreach ($this->dados[$iLinha] as $icols => $value) { 
                $colunas .= '<td>'.$value.'</td>';
                $colunasNum++;
                if($colunasNum == $this->numColunas) {
                    break;
                }
            }
        }
            return $colunas;
        }

        public function setColunas($iColunas) {
            $this->numColunas = $iColunas;
        }

        public function setLinhas($iLinhas) {
            $this->numLinhas = $iLinhas;
        }

        //adicionar dentro de um array
        public function addHeaderTable($aHeaderTable) {
            $this->headertable[] = $aHeaderTable;
        }

        public function getHeaderTable() {
            $header = '';
            foreach ($this->headertable as $value) {
                $header .= '<th class="col">'.$value.'</th>';
            }
            return $header;
        }
        


    }

?>