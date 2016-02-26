<?php

use Ibrahimmomani\Numerals\Arabic;

class ArabicTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @param $input
     * @param $expected
     *
     * @dataProvider providesArabicToRoman
     */
    public function testArabic($input, $expected)
    {
        $number = new Arabic($input);
        $this->assertEquals($expected, $number, 'Failed to assert that conversion of '.$input.'
        to roman expected into "'.$expected.'"');
    }

    public function providesArabicToRoman()
    {
        return [
            [0  , ''],
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
