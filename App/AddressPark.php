<?php
namespace App;

class AddressPark extends Address
{
    public $countryName = 'Australia';
    public function display()
    {
        $output = '<div style="background-color:green;">';
        $output .= parent::display(); // TODO: Change the autogenerated stub
        $output .= '</div>';
        return $output;
    }

    protected function _init()
    {
        $this->setAddressTypeId(Address::ADDRESS_PARK);
    }
}