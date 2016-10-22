<?php
require __DIR__ . '/autoload.php';
echo '<h2>Instantiating AddressResidence</h2>';
$address_res = new \App\AddressBusiness();
echo $address_res;
echo '<h2>Setting properties</h2>';
/*$address->cityName = 'Hamlet';*/

echo '<h2>Testing __construct</h2>';
$address_business = new \App\AddressBusiness(array(
    'cityName' => 'Villageland'
));
echo $address_business;

$address_park = new \App\AddressPark();
$address_park->cityName = 'Townsville';
echo $address_park;

echo '<h2>Instantiating AddressPark</h2>';
$address_park2 = new \App\AddressPark(array(
    'streetAddress1' => 'prosp 21',
    'streetAddress2' => 'jukova 21',
));

echo $address_park2;

echo '<h2>Cloning AddressPark</h2>';
$address_park2_clone = clone $address_park2;
echo '<tt><pre>' .var_export($address_park2_clone, TRUE) . '</tt></pre>';
echo '<tt><pre>' .var_export($address_park2, TRUE) . '</tt></pre>';

echo '<h2>Copying AddressBussiness reference</h2>';
$address_business_copy = $address_business;

echo '<h2>Testing to an object</h2>';
$test_object = (object) array(
    'hello' => 'world',
    'nested' => array('key' => 'value'),
);
echo '<tt><pre>' .var_export($test_object, TRUE) . '</tt></pre>';