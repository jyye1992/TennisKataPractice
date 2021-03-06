<?php

namespace Tests;

use App\Player;
use App\Tennis;
use PHPUnit\Framework\TestCase;

class TennisTest extends TestCase
{
    private $player1;
    private $player2;
    private $tennis;
    private $player1Name;
    /**
     * @var string
     */
    private $player2Name;

    /**
     * @test
     */
    public function love_love()
    {
        $this->shouldScore('love-love');
    }

    private function shouldScore($score): void
    {
        $this->assertEquals($score, $this->tennis->score());
    }

    /**
     * @test
     */
    public function fifteen_love()
    {
        $this->givenPlayer1GainPoint(1);

        $this->shouldScore('fifteen-love');
    }

    /**
     * @param $point
     */
    private function givenPlayer1GainPoint($point): void
    {
        $this->player1->gainPoint($point);
    }

    /**
     * @test
     */
    public function fifteen_fifteen()
    {
        $this->givenPlayer1GainPoint(1);
        $this->givenPlayer2GainPoint(1);

        $this->shouldScore('fifteen-fifteen');
    }

    /**
     * @param $point
     */
    private function givenPlayer2GainPoint($point): void
    {
        $this->player2->gainPoint($point);
    }

    /**
     * @test
     */
    public function thirty_love()
    {
        $this->givenPlayer1GainPoint(2);

        $this->shouldScore('thirty-love');
    }

    /**
     * @test
     */
    public function forty_love()
    {
        $this->givenPlayer1GainPoint(3);

        $this->shouldScore('forty-love');
    }

    /**
     * @test
     */
    public function thirty_thirty()
    {
        $this->givenPlayer1GainPoint(2);
        $this->givenPlayer2GainPoint(2);

        $this->shouldScore('thirty-thirty');
    }

    /**
     * @test
     */
    public function deuce()
    {
        $this->givenPlayer1GainPoint(3);
        $this->givenPlayer2GainPoint(3);

        $this->shouldScore('deuce');


        $this->givenPlayer1GainPoint(4);
        $this->givenPlayer2GainPoint(4);

        $this->shouldScore('deuce');


        $this->givenPlayer1GainPoint(5);
        $this->givenPlayer2GainPoint(5);

        $this->shouldScore('deuce');
    }

    /**
     * @test
     */
    public function advantage()
    {
        $this->givenPlayer1GainPoint(4);
        $this->givenPlayer2GainPoint(3);

        $this->shouldScore('Advantage: ' . $this->player1Name);


        $this->givenPlayer1GainPoint(3);
        $this->givenPlayer2GainPoint(4);

        $this->shouldScore('Advantage: ' . $this->player2Name);
    }

    /**
     * @test
     */
    public function winner()
    {
        $this->givenPlayer1GainPoint(4);
        $this->givenPlayer2GainPoint(0);

        $this->shouldScore('Winner: ' . $this->player1Name);


        $this->givenPlayer1GainPoint(0);
        $this->givenPlayer2GainPoint(4);

        $this->shouldScore('Winner: ' . $this->player2Name);
    }

    protected function setUp()
    {
        parent::setUp();

        $this->player1Name = 'player1Name';
        $this->player2Name = 'player2Name';
        $this->player1 = new Player($this->player1Name, 0);
        $this->player2 = new Player($this->player2Name, 0);

        $this->tennis = new Tennis($this->player1, $this->player2);
    }

}
