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
}