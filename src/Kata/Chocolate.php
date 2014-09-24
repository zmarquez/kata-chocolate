<?php
namespace Kata;

/**
 * Class Chocolate
 * @package Kata
 */
class Chocolate
{
    private $totalAmount;
    private $costPerChocolate;
    private $wrappersForFree;

    public function __construct($n, $c, $m)
    {
        $this->totalAmount = $n;
        $this->costPerChocolate = $c;
        $this->wrappersForFree = $m;

    }

    public function eat()
    {
    }

}