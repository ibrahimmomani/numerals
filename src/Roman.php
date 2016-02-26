<?php

namespace Ibrahimmomani\Numerals;

/**
 * Class Roman
 * @package Ibrahimmomani\Numerals
 */
class Roman implements NumeralInterface
{
    /**
     * @var string $number
     */
    protected $number = '';

    /**
     * @var integer $result
     */
    protected $result = 0;

    /**
     * @return integer
     */
    protected function getResult()
    {
        return $this->result;
    }

    /**
     * @param integer $result
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
        return (string)$this->getResult();
    }

    /**
     * Roman constructor.
     * @param string $number
     */
    public function __construct($number = '')
    {
        $this->setNumber($number);
        $this->setResult($this->format($this->getNumber()));
    }

    /**
     * Roman to Arabic format
     *
     * @param string $number
     * @return integer
     */
    private function format($number = '')
    {
        $dictionary = [
            ["key" => 'I', "value" => 1],
            ["key" => 'V', "value" => 5],
            ["key" => 'X', "value" => 10],
            ["key" => 'L', "value" => 50],
            ["key" => 'C', "value" => 100],
            ["key" => 'D', "value" => 500],
            ["key" => 'M', "value" => 1000],
            ["key" => '', "value" => 0]
        ];
        $format = 0;
        $state = 0;
        $len = strlen($number) - 1;

        while ($len >= 0) {
            $i = 0;
            while ($dictionary[$i]['value']) {
                if (strtoupper($number[$len]) == $dictionary[$i]['key']) {
                    if ($state > $dictionary[$i]['value']) {
                        $format -= $dictionary[$i]['value'];
                    } else {
                        $format += $dictionary[$i]['value'];
                        $state = $dictionary[$i]['value'];
                    }
                }
                $i++;
            }
            $len--;
        }

        return $format;
    }

}