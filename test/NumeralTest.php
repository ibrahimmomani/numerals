<?php

use Numerals\Numeral;

class NumeralTest extends \PHPUnit_Framework_TestCase
{
    public function getTypeList()
    {
        return array(
            array('arabic'),
            array('roman'),
        );
    }
    /**
     * @dataProvider getTypeList
     */
    public function testCreation($type, $value=123)
    {
        $obj = Numeral::factory($type, $value);
        $this->assertInstanceOf('Numerals\NumeralInterface', $obj);
    }
    /**
     * @expectedException InvalidArgumentException
     */
    public function testException()
    {
        Numeral::factory('', '');
    }
}
