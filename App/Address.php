<?php
namespace App;

/**
 * Class Address
 * @package Project\Classes
 */
abstract class Address implements Model
{
    const ADDRESS_HOME = 1;
    const ADDRESS_WORK = 2;
    const ADDRESS_PARK = 3;
    static public $validAddressTypes = [
        self::ADDRESS_HOME => 'Home',
        self::ADDRESS_WORK => 'Work',
        self::ADDRESS_PARK => 'Park'
    ];
    public $streetAddress1;
    public $streetAddress2;

    public $cityName = 'Hamlet';

    public $regionName;

    public $countryName;

    protected $addressId;
    protected $timeCreated;
    protected $timeUpdated;
    protected $_postal_code;
    protected $addressTypeId;

    function __clone()
    {
        $this->timeCreated = time();
        $this->timeUpdated = NULL;
    }

    function __construct($data = array())
    {
        $this->_init();
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
/*        if ('addressTypeId' == $name){
            $this->setAddressTypeId($value);
            return;
        }*/
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

    abstract protected function _init();

    /**
     * Guess the postal code given the subdivision and city name.
     * @todo Replace with a database lookup.
     * @return string
     */
    protected function _postal_code_guess() {
        $db = Db::getInstance();
        $mysqli = $db->getConnection();
        $city_name = $this->cityName;
        $sql = 'SELECT postal_code FROM location WHERE city_name = "'.$city_name .'" ';

        $res = $mysqli->query($sql);
        if ($row = $res->fetch_assoc()){
            return $row['postal_code'];
        }
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

    static public function isValidAddress($addressId){
        return array_key_exists($addressId, self::$validAddressTypes);
    }

    protected function setAddressTypeId($addressTypeId){
        if(self::isValidAddress($addressTypeId)){
            $this->addressTypeId = $addressTypeId;
        }
    }
    final public static function load($address_id){

    }
    final public function save()
    {
        // TODO: Implement save() method.
    }
}