<?php

namespace Tests;

use App\Player;
use App\Tennis;
use PHPUnit\Framework\TestCase;

class TennisTest extends TestCase
{
    /**
     * @test
     */
    public function love_love()
    {
        $player1 = new Player('name1', 0);
        $player2 = new Player('name2', 0);
        $tennis = new Tennis($player1, $player2);

        $expected = 'love-love';
        $actual = $tennis->score();

        $this->assertEquals($expected, $actual);
    }

    /**
     * @test
     */
    public function fifteen_love()
    {
        $player1 = new Player('name1', 0);
        $player2 = new Player('name2', 0);
        $tennis = new Tennis($player1, $player2);

        $expected = 'fifteen-love';

        $player1->gainPoint(1);
        $actual = $tennis->score();

        $this->assertEquals($expected, $actual);
    }

    /**
     * @test
     */
    public function fifteen_fifteen()
    {
        $player1 = new Player('name1', 0);
        $player2 = new Player('name2', 0);
        $tennis = new Tennis($player1, $player2);

        $expected = 'fifteen-fifteen';

        $player1->gainPoint(1);
        $player2->gainPoint(1);
        $actual = $tennis->score();

        $this->assertEquals($expected, $actual);
    }

    /**
     * @test
     */
    public function thirty_love()
    {
        $player1 = new Player('name1', 0);
        $player2 = new Player('name2', 0);
        $tennis = new Tennis($player1, $player2);

        $expected = 'thirty-love';

        $player1->gainPoint(2);
        $actual = $tennis->score();

        $this->assertEquals($expected, $actual);
    }

    /**
     * @test
     */
    public function forty_love()
    {
        $player1 = new Player('name1', 0);
        $player2 = new Player('name2', 0);
        $tennis = new Tennis($player1, $player2);

        $expected = 'forty-love';

        $player1->gainPoint(3);

        $actual = $tennis->score();

        $this->assertEquals($expected, $actual);
    }

}
