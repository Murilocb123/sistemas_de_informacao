<?php
    class Time{
        private string $nome;
        private int $anoFundacao;
        private array $jogadores;

        public function getJogadores(): array
        {
            return $this->jogadores;
        }

        public function addJogador(Jogador $ojogador): void
        {
            array_push($this->jogadores, $ojogador);
        }

        public function getNome(): string
        {
            return $this->nome;
        }
        public function setNome(string $nome): Time
        {
            $this->nome = $nome;
            return $this;
        }
        public function getAnoFundacao(): int
        {
            return $this->anoFundacao;
        }
        public function setAnoFundacao(int $anoFundacao): Time
        {
            $this->anoFundacao = $anoFundacao;
            return $this;
        }
    }

    class Jogador {
        private string $nome;
        private string $posicao;

        public function getNome(): string
        {
            return $this->nome;
        }

        public function setNome(string $nome): Jogador
        {
            $this->nome = $nome;
            return $this;
        }

        public function getPosicao(): string
        {
            return $this->posicao;
        }

        public function setPosicao(string $posicao): Jogador
        {
            $this->posicao = $posicao;
            return $this;
        }
    }

    $jogador1 = new Jogador();
    $jogador1->setNome("Jogador 1")->setPosicao("Atacante");

    $jogador2 = new Jogador();
    $jogador2->setNome("Jogador 2")->setPosicao("Atacante");

    $jogador3 = new Jogador();
    $jogador3->setNome("Jogador 3")->setPosicao("Atacante");

    $jogador4 = new Jogador();
    $jogador4->setNome("Jogador 4")->setPosicao("Atacante");

    $jogador5 = new Jogador();
    $jogador5->setNome("Jogador 5")->setPosicao("Atacante");

    $time = new Time();
    $time->setNome("Time 1")->setAnoFundacao(2021);
    $time->addJogador($jogador1);
    $time->addJogador($jogador2);
    $time->addJogador($jogador3);
    $time->addJogador($jogador4);
    $time->addJogador($jogador5);

    echo "<pre>";
    print_r($time->getJogadores());
    echo "</pre>";
?>