<?php
//DB configuration
namespace config;
use Exception;
use PDO;

class DB
{
    const USER = "root";
    const PASS = '';
    const HOST = "localhost";
    const DB = "cars";

    public function getConnection()
    {
        $errorMessage = "Connection not detected ";

        $user = self::USER;
        $pass = self::PASS;
        $host = self::HOST;
        $db = self::DB;

        $connect = new PDO("mysql:dbname=$db;host=$host", $user, $pass);

        if (!$connect){
            throw new Exception($errorMessage);
        } else {
            return $connect;
        }
    }
}
