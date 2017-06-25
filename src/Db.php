<?php

class DB
{
    public $db;
    public $host;
    public $db_name;
    public $username;
    public $password;
    public $tables;

    public function __construct($host, $db_name, $username, $password)
    {
        $this->db_name =$db_name;
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
    }

    public function connect()
    {

        $this->db = new mysqli($this->host, $this->username, $this->password, $this->db_name);
    }

    public function getTables()
    {
        $result = $this->db->query('SHOW TABLES')->fetch_all();

        foreach ($result as $key => $value) {
            $this->tables[$value[0]] = $value[0];
        }

        return $this->tables;
    }

    public function getSchemaTable($table)
    {
        $result = $this->db->query('DESCRIBE '.$table);

        if ($result->num_rows == null){
            return [];
        }
        $res = [];
        foreach($result->fetch_all() as $key=>$value) {
            $res[$value[0]] = $value[0];
        }
        return $res;
    }

}