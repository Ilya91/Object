<?php
namespace App;
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

    public function __construct()
    {
        $this->connection = new \mysqli('localhost','root', '', 'address');
        if (mysqli_connect_error()){
            trigger_error('Failed to connection: ' . mysqli_connect_error(), E_USER_ERROR);
        }
    }

    private function __clone(){

    }

    public function getConnection(){
        return $this->connection;
    }
/*
    public function __toString()
    {
        return 'Hello world';
    }

    public function display(){
        $output = "";
        $output .= $this->connection->affected_rows;

        return $output;
    }*/
}