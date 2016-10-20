<?php

/*namespace Project\Classes;*/

/**
 * Class Address
 * @package Project\Classes
 */
class Address
{
    static public $validAddressTypes = [
        1 => 'Home',
        2 => 'Work',
        3 => 'Park'
    ];
    public $streetAddress1;
    public $streetAddress2;

    public $cityName;

    public $regionName;

    public $countryName;

    protected $addressId;
    protected $timeCreated;
    protected $timeUpdated;
    protected $_postal_code;

    function __construct($data = array())
    {
        $this->timeCreated = time();
        if (!is_array($data)){
            trigger_error('Unable to construct address with a ' . get_class($name));
        }
        if (count($data) > 0){
            foreach ($data as $name => $value) {
                $this->$name = $value;
            }
        }
    }

    /**
     * Magic __get.
     * @param string $name
     * @return mixed
     */
    function __get($name) {
        // Postal code lookup if unset.
        if (!$this->_postal_code) {
            $this->_postal_code = $this->_postal_code_guess();
        }

        // Attempt to return a protected property by name.
        $protected_property_name = '_' . $name;
        if (property_exists($this, $protected_property_name)) {
            return $this->$protected_property_name;
        }

        // Unable to access property; trigger error.
        trigger_error('Undefined property via __get: ' . $name);
        return NULL;
    }

    /**
     * Magic __set.
     * @param string $name
     * @param mixed $value
     */
    function __set($name, $value) {
        // Allow anything to set the postal code.
        if ('postal_code' == $name) {
            $this->$name = $value;
            return;
        }

        // Unable to access property; trigger error.
        trigger_error('Undefined or unallowed property via __set(): ' . $name);
    }

    function __toString()
    {
        return $this->display();
    }

    /**
     * Guess the postal code given the subdivision and city name.
     * @todo Replace with a database lookup.
     * @return string
     */
    protected function _postal_code_guess() {
        return 'Postal code undefined';
    }
    public function display(){
        $output = "";
        $output .= $this->streetAddress1;
        if ($this->streetAddress2){
            $output .= '<br>' . $this->streetAddress2;
        }
        $output .= '<br>';
        $output .=  $this->cityName . ', ' . $this->regionName;
        $output .=  ' ' . $this->postal_code;
        $output .=  '<br>' . $this->countryName;
        return $output;
    }
}