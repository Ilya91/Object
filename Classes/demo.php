<?php
/**
 * Define autoloader
 * @param $class_name
 */
function __autoload($class_name){
    include $class_name . '.php';
}

echo '<h2>Instantiating Address</h2>';

$address = new Address;
echo '<h2>Setting properties</h2>';
/*$address->cityName = 'Hamlet';*/
echo $address;

echo '<h2>Testing __construct</h2>';
$address_2 = new Address(array(
    'cityName' => 'Villageland'
));
echo $address_2;

$address_3 = new Address;
$address_3->cityName = 'Townsville';
echo $address_3;


