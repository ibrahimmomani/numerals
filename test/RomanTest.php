<?php

use Numerals\Roman;

class RomanTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @param $expected
     * @param $input
     *
     * @dataProvider providesRomanToArabic
     */
    public function testRoman($expected, $input)
    {
        $number = new Roman($input);
        $this->assertEquals($expected, (string)$number, 'Failed to assert that conversion of '.$input.'
        to arabic expected into "'.$expected.'"');
    }

    public function providesRomanToArabic()
    {
        return [
            [1  , 'I'],
            [2  , 'II'],
            [3  , 'III'],
            [4  , 'IV'],
            [5  , 'V'],
            [6  , 'VI'],
            [7  , 'VII'],
            [10 , 'X'],
            [13 , 'XIII'],
            [43 , 'XLIII'],
            [59 , 'LIX'],
            [68 , 'LXVIII'],
            [100 , 'C'],
            [101 , 'CI'],
            [137,'CXXXVII'],
            [249,'CCXLIX'],
            [371,'CCCLXXI'],
            [499,'CDXCIX'],
            [3333, 'MMMCCCXXXIII'],
            [4999, 'MMMMCMXCIX']
        ];
    }
}