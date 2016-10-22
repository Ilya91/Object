<?php
namespace App;

class AddressResidence extends Address
{
    protected function _init()
    {
        $this->setAddressTypeId(Address::ADDRESS_RESIDENCE);
    }
}