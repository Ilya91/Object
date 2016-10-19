<?php

namespace Project\Classes;

/**
 * Class Address
 * @package Project\Classes
 */
class Address
{
    public $streetAddress1;
    public $streetAddress2;

    public $cityName;

    public $regionName;

    public $index;

    public $countryName;

    /**
     * Display an address in html
     * @return string
     */
    function display(){
        $output = "";
        $output .= $this->streetAddress1;
        if ($this->streetAddress2){
            $output .= '<br>' . $this->streetAddress2;
        }
        $output .= '<br>';
        $output .=  $this->cityName . ', ' . $this->regionName;
        $output .=  ' ' . $this->index;
        $output .=  '<br>' . $this->countryName;
        return $output;
    }
}