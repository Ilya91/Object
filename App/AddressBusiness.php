<?php
namespace App;

class AddressBusiness extends Address
{
    protected function _init()
    {
        $this->setAddressTypeId(Address::ADDRESS_WORK);
    }
}