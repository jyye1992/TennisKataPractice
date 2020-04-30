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

        if ($this->player1->point > 2 && $this->player2->point > 2) {
            if ($this->player1->point == $this->player2->point) {
                return 'deuce';
            } elseif (abs($this->player1->point - $this->player2->point)) {
                if ($this->player1->point > $this->player2->point) {
                    return 'Advantage: ' . $this->player1->name;
                } else {
                    return 'Advantage: ' . $this->player2->name;
                }
            }
        } elseif (abs($this->player1->point - $this->player2->point) > 3) {
            if ($this->player1->point > $this->player2->point) {
                return 'Winner: ' . $this->player1->name;
            } else {
                return 'Winner: ' . $this->player2->name;
            }
        }

        return $scoreText[$this->player1->point] . '-' . $scoreText[$this->player2->point];
    }


}