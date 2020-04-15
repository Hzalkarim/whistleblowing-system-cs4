<?php

abstract class WbController
{
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $dbname = "whistleb_system";
    private $model;
    public $connection;

    function __construct(){
        $conn = mysqli_connect($this->host, $this->user, $this->password);
        $dbselect = mysqli_select_db($conn, $this->dbname);
        $this->connection = $conn;
    }

    protected function getModel(){
        return $this->model;
    }

    public function where($model){
        $this->model = $model;
        return $this;
    }

    public abstract function insert($model);
    public abstract function update($model);
    public abstract function delete();
    public abstract function select();
}
