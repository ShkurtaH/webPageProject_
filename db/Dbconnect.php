<?php

class Dbconnect
{
    private $_localhost = 'localhost';
    private $_user = 'root';
    private $_password = '';
    private $_dbname = 'photography';
    protected $connection;

    public function __construct()
    {

        if (!isset($this->connection)) {
            $this->connection = new mysqli($this->_localhost, $this->_user, $this->_password, $this->_dbname);
        }
        else{
            echo "connection failed";
        }

        return $this->connection;

    }
}