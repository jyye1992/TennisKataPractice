<?php


namespace App;


class Player
{
    public $name;
    public $point;

    /**
     * Player constructor.
     * @param $name
     * @param $point
     */
    public function __construct($name, $point)
    {
        $this->name = $name;
        $this->point = $point;
    }

    /**
     * @param mixed $point
     */
    public function gainPoint($point): void
    {
        $this->point = $point;
    }
}