<?php

/**
 * Class Db. MySqli connection
 */
class Db
{
    private $connection;
    private static $instance;

    /**
     * Get an instance of the DB
     * @return Db
     */
    public static function getInstance(){
        if (!self::$instance){
            self::$instance = new self();
        }
        return self::$instance;
    }
}