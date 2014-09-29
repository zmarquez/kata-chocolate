<?php
namespace Tests\Kata;

use Kata\Chocolate;

/**
 * Class ChocolateTest
 * @package Kata\Tests
 */
class ChocolateTest extends \PHPUnit_Framework_TestCase
{
    public function dataProvider()
    {
        return [
            ['input1.txt', 'output1.txt'],
            ['input2.txt', 'output2.txt']
        ];
    }

    /**
     * @test
     * @dataProvider dataProvider
     */
    public function it_should_pass_all_inputs($inputFile, $outputFile)
    {
        $inputResource = fopen(__DIR__ . '/'.$inputFile, 'r');
        $outputResource = fopen(__DIR__ . '/'.$outputFile, 'r');

        while (($inputLine = fgets($inputResource)) && ($outputLine = fgets($outputResource))) {
            $inputLine = trim($inputLine);
            $outputLine = trim($outputLine);
            list($n, $c, $m) = explode(' ', $inputLine);
            $chocolate = new Chocolate($n, $c, $m);
            $this->assertEquals(
                $outputLine,
                $chocolate->eat()
            );
        }

        fclose($inputResource);
        fclose($outputResource);
    }

    /**
     * @test
     */
    public function it_should_cant_buy_if_have_no_money()
    {
        $chocolate = new Chocolate(0, 0, 0);
        $this->assertEquals(0, $chocolate->eat());
    }

    /**
     * @test
     */
    public function it_should_cant_buy_if_have_not_enough_money()
    {
        $chocolate = new Chocolate(1, 2, 2);
        $this->assertSame(0, $chocolate->eat());
    }

    /**
     * @test
     */
    public function it_should_can_buy_one_without()
    {
        $chocolate = new Chocolate(2, 2, 2);
        $this->assertSame(1, $chocolate->eat());
    }

    /**
     * @test
     */
    public function it_should_can_buy_one_with()
    {
        $chocolate = new Chocolate(3, 2, 2);
        $this->assertSame(1, $chocolate->eat());
    }

    /**
     * @test
     */
    public function it_should_can_buy_and_get_one_extra()
    {
        $chocolate = new Chocolate(4, 2, 2);
        $this->assertSame(3, $chocolate->eat());
    }

    /**
     * @test
     */
    public function it_should_can_buy_and_get_more_then_one_extra()
    {
        $chocolate = new Chocolate(10, 2, 2);
        $this->assertSame(9, $chocolate->eat());
    }
}