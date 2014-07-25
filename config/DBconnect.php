<?php
/**
 * Created by PhpStorm.
 * User: David
 * Date: 3/6/14
 * Time: 7:44 PM
 */
class DBconnect{

    private $dsn = 'mysql:dbname=storeartonline_db;host=localhost';
    private $username = 'root';
    private $password = '';
    private $dbconn = null;

    function openDBconnection(){

        try{
            $dbconn = new PDO($this->dsn, $this->username, $this->password);
        }catch (PDOException $e){
            echo 'Connection failed: ' .$e->getMessage();
            die();
        }

        return $dbconn;
    }

    function closeDBConnection(){
        $this->dbconn = null;
    }

}
