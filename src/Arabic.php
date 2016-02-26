<?php

namespace Ibrahimmomani\Numerals;

/**
 * Class Arabic
 * @package Ibrahimmomani\Numerals
 */
class Arabic implements NumeralInterface
{
    /**
     * @var integer $number
     */
    protected $number;

    /**
     * @var string $result
     */
    protected $result = '';

    /**
     * @return string
     */
    protected function getResult()
    {
        return $this->result;
    }

    /**
     * @param string $result
     */
    protected function setResult($result)
    {
        $this->result = $result;
    }

    /**
     * @return mixed
     */
    protected function getNumber()
    {
        return $this->number;
    }

    /**
     * @param mixed $number
     */
    protected function setNumber($number)
    {
        $this->number = $number;
    }

    public function __toString()
    {
        return $this->getResult();
    }

    /**
     * Arabic constructor.
     * @param int $number
     */
    public function __construct($number = 0)
    {
        $this->setNumber($number);
        $this->setResult($this->format($this->getNumber()));
    }

    /**
     * Arabic to roman format
     *
     * @param int $number
     * @return string
     * @throws \Exception
     */
    private function format($number = 0)
    {
        if ($number < 0 || $number > 9999)
            throw new \Exception('Out of range exception.');

        $onesCollection = [
            1 => "I",
            2 => "II",
            3 => "III",
            4 => "IV",
            5 => "V",
            6 => "VI",
            7 => "VII",
            8 => "VIII",
            9 => "IX"
        ];

        $tensCollection = [
            1 => "X",
            2 => "XX",
            3 => "XXX",
            4 => "XL",
            5 => "L",
            6 => "LX",
            7 => "LXX",
            8 => "LXXX",
            9 => "XC"
        ];

        $hundredCollection = [
            1 => "C",
            2 => "CC",
            3 => "CCC",
            4 => "CD",
            5 => "D",
            6 => "DC",
            7 => "DCC",
            8 => "DCCC",
            9 => "CM"
        ];

        $thousandCollection = [
            1 => "M",
            2 => "MM",
            3 => "MMM",
            4 => "MMMM",
            5 => "MMMMM",
            6 => "MMMMMM",
            7 => "MMMMMMM",
            8 => "MMMMMMMM",
            9 => "MMMMMMMMM"
        ];

        $ones = $number % 10;
        $tens = ($number - $ones) % 100;
        $hundreds = ($number - $tens - $ones) % 1000;
        $thousands = ($number - $hundreds - $tens - $ones) % 10000;

        $tens = $tens / 10;
        $hundreds = $hundreds / 100;
        $thousands = $thousands / 1000;

        $format = '';
        if ($thousands) $format .= $thousandCollection[$thousands];
        if ($hundreds) $format .= $hundredCollection[$hundreds];
        if ($tens) $format .= $tensCollection[$tens];
        if ($ones) $format .= $onesCollection[$ones];

        return $format;
    }
}