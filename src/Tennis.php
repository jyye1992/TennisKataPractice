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
        if ($this->player1->point == 1 && $this->player2->point == 0) {
            return 'fifteen-love';
        } elseif ($this->player1->point == 1 && $this->player2->point == 1) {
            return 'fifteen-fifteen';
        } elseif ($this->player1->point == 2 && $this->player2->point == 0) {
            return 'thirty-love';
        } else {
            return 'love-love';
        }
    }


}