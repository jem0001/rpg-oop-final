<?php
class DbConfig
{
    private $_host = 'localhost';
    private $_username = 'root';
    private $_password = '';
    private $_database = 'rpgdatabase1';

    public $connection;

    public function __construct()
    {
        if (!isset($this->connection)) {

            try {
                $this->connection = new mysqli($this->_host, $this->_username, $this->_password, $this->_database);

                if (!$this->connection) {
                    echo 'Cannot connect to database server';
                    exit;
                }
            } catch (Exception) {
            }
        }
    }

    public function closeDb()
    {
        $this->connection->close();
    }
}
