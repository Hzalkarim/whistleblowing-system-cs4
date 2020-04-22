<?php

abstract class WbController
{
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $dbname = "whistleblowing_system_2";
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

    #set model for conditions
    public function where($model){
        $this->model = $model;
        return $this;
    }

    public function getPrimaryKeyCondition() {
        if (is_null($this->getModel())) return NULL;

        $modelClassName = explode("Controller", get_class($this))[0];

        if ($this->getModel() instanceof $modelClassName) {
            return $this->getModel()->getConditions();
        } else {
            $model = new $modelClassName();
            $model_fk = $model->getForeignKeys();

            $col = $model_fk[$this->getModel()->getTableName()];

            $condition = "{$col} = '{$this->getModel()->getPrimaryKey()}'";
            return $condition;
        }
    }

    public abstract function insert($model);
    public abstract function update($model);
    public abstract function delete();
    public abstract function select();
}
