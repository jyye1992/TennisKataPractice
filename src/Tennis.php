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


        if ($this->isPointMoreThenTwo()) {
            if ($this->isDeuce()) {
                return 'deuce';
            } elseif ($this->isAdvantage()) {
                return 'Advantage: ' . $this->willWin()->name;
            }
        } elseif ($this->isWinner()) {
            return 'Winner: ' . $this->willWin()->name;
        } else {
            return $scoreText[$this->player1->point] . '-' . $scoreText[$this->player2->point];
        }

    }

    /**
     * @return bool
     */
    private function isPointMoreThenTwo(): bool
    {
        return $this->player1->point > 2 && $this->player2->point > 2;
    }

    /**
     * @return bool
     */
    private function isDeuce(): bool
    {
        return $this->player1->point == $this->player2->point;
    }

    /**
     * @return float|int
     */
    private function isAdvantage()
    {
        return abs($this->player1->point - $this->player2->point);
    }

    /**
     * @return mixed
     */
    private function willWin()
    {
        if ($this->player1->point > $this->player2->point) {
            $player = $this->player1;
        } else {
            $player = $this->player2;
        }

        return $player;
    }

    /**
     * @return bool
     */
    private function isWinner(): bool
    {
        return abs($this->player1->point - $this->player2->point) > 3;
    }
}