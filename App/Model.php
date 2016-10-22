<?php
namespace App;

interface Model
{
    static function load($address_id);
    function save();
}