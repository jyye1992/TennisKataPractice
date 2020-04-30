<?php


namespace App;


class Tennis
{
    public $player1;
    public $player2;

    /**
     * Tennis constructor.
     * @param $player1
     * @param $player2
     */
    public function __construct($player1, $player2)
    {
        $this->player1 = $player1;
        $this->player2 = $player2;
    }

    public function score()
    {
        $scoreText = [
            0 => 'love',
            1 => 'fifteen',
            2 => 'thirty',
            3 => 'forty',
        ];

        return $scoreText[$this->player1->point] . '-' . $scoreText[$this->player2->point];
    }


}