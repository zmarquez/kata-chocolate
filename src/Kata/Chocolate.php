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
        $noHasMoney = $this->totalAmount === 0;
        $noEnoughMoney = $this->totalAmount < $this->costPerChocolate;

        if ($noHasMoney || $noEnoughMoney) {
            return 0;
        }

        $eaten = (int)($this->totalAmount / $this->costPerChocolate);
        $wrappers = $eaten;

        while ($wrappers >= $this->wrappersForFree) {
            list($eaten, $wrappers) = $this->exchangeWrappersForFreeChocolates($wrappers, $eaten);
        }

        return $eaten;
    }

    /**
     * @param $wrappers
     * @param $eaten
     * @return array
     */
    private function exchangeWrappersForFreeChocolates($wrappers, $eaten)
    {
        $freeChocolates = (int)($wrappers / $this->wrappersForFree);
        $eaten += $freeChocolates;
        $wrappers = $wrappers - ($this->wrappersForFree * $freeChocolates) + $freeChocolates;

        return array($eaten, $wrappers);
    }

}