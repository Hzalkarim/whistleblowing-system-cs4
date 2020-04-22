<?php

abstract class WbModel {

    protected $columnFunc;
    protected $tableName;
    protected $foreignKeys;

    function __construct(){
        $this->setColumnFunc();
        $this->setTableName();
        $this->setForeignKeys();
    }

    abstract public function getPrimaryKey();
    abstract protected function setColumnFunc();
    abstract protected function setTableName();
    abstract protected function setForeignKeys();

    protected function getColumnFunc() {
        return $this->columnFunc;
    }

    public function getTableName() {
        return $this->tableName;
    }

    public function getForeignKeys() {
        return $this->foreignKeys;
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

        return implode(", ", $conditions);
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
