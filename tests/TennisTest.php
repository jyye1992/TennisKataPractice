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

    /**
     * @test
     */
    public function love_love()
    {
        $this->shouldScore('love-love');
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
     * @test
     */
    public function fifteen_fifteen()
    {
        $this->givenPlayer1GainPoint(1);
        $this->givenPlayer2GainPoint(1);

        $this->shouldScore('fifteen-fifteen');
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

    protected function setUp()
    {
        parent::setUp();

        $this->player1 = new Player('name1', 0);
        $this->player2 = new Player('name2', 0);

        $this->tennis = new Tennis($this->player1, $this->player2);
    }

    private function shouldScore($score): void
    {
        $this->assertEquals($score, $this->tennis->score());
    }

    /**
     * @param $point
     */
    private function givenPlayer1GainPoint($point): void
    {
        $this->player1->gainPoint($point);
    }

    /**
     * @param $point
     */
    private function givenPlayer2GainPoint($point): void
    {
        $this->player2->gainPoint($point);
    }

}
