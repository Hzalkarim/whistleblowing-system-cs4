<?php

abstract class WbModel {

    protected $columnFunc;
    protected $tableName;
    protected $foreignModelArray;

    function __construct(){
        $this->setColumnFunc();
        $this->setTableName();
    }

    /**
    *
    *@return obj return the value of the primary key of the table
    **/
    abstract public function getPrimaryKey();

    /**
    *
    * set the $this->columnFunc in format of Array() {$dbColumnName => $setter/getter}
    * $setter/getter without the set/get prefix
    **/
    abstract protected function setColumnFunc();

    /**
    *
    * provide table name of the model to $this->tableName
    **/
    abstract protected function setTableName();

    public function getColumnFunc() {
        return $this->columnFunc;
    }

    public function getTableName() {
        return $this->tableName;
    }

    public function getForeignModel($modelName) {
        return $this->$foreignModelArray[$modelName];
    }

    public function setForeignModel($modelArray) {
        $this->$foreignModelArray = $modelArray;
    }

    public function setAllValues($data) {
        $colfun = $this->getColumnFunc();

        foreach ($colfun as $col => $fun){
            if (!isset($data[$col])) continue;
            $act = "set" . $fun;
            $this->$act($data[$col]);
        }
    }

    public function getColumns(){
        return array_keys($this->columnFunc);
    }

    public function getConditions() {
        $colfun = $this->getColumnFunc();
        // $db_wb_user = Array();
        //
        // foreach ($colfun as $col => $fun) {
        //     $act = "get" . $fun;
        //     $db_wb_user[$col] = $this->$act();
        // }

        $conditions = Array();
        foreach ($colfun as $col => $fun) {
            $act = "get" . $fun;
            $val = $this->$act();
            if (is_null($val)) continue;

            $conditions[] = "{$col} = '{$val}'";
        }

        $wrongNull = Array("= 'NULL'");
        $rightNull = Array("IS NULL");
        $rightCond = str_replace($wrongNull, $rightNull, $conditions);

        return implode(" AND ", $rightCond);
    }

    public function getAllValues() {
        $colfun = $this->getColumnFunc();

        $values = Array();
        foreach ($colfun as $col => $fun) {
            $act = "get" . $fun;
            $val = $this->$act();
            if (is_null($val)){
                $values[] = "NULL";
            } else {
                $values[] = $val;
            }
        }

        return $values;
    }
}
