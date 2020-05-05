<?php

abstract class WbModel {

    protected $columnFunc;
    protected $tableName;
    protected $childModelArray;

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

    public function getChildModel($modelName) {
        return $this->childModelArray[$modelName];
    }

    public function setChildModel($modelArray) {
        $this->childModelArray = $modelArray;
    }

    public function setAllValues($data, $assoc = false) {
        $colfun = $this->getColumnFunc();

        $i = -1;
        foreach ($colfun as $col => $fun){
            $i++;
            if ($assoc && isset($data[$col])) {
                $act = "set" . $fun;
                $this->$act($data[$col]);
            } elseif (!$assoc && isset($data[$i])) {
                $act = "set" . $fun;
                $this->$act($data[$i]);
            }
        }
    }

    public function getColumns(){
        return array_keys($this->columnFunc);
    }

    // public function getConditions() {
    //     $colfun = $this->getColumnFunc();
    //     // $db_wb_user = Array();
    //     //
    //     // foreach ($colfun as $col => $fun) {
    //     //     $act = "get" . $fun;
    //     //     $db_wb_user[$col] = $this->$act();
    //     // }
    //
    //     $conditions = Array();
    //     foreach ($colfun as $col => $fun) {
    //         $act = "get" . $fun;
    //         $val = $this->$act();
    //         if (is_null($val) || $val = '') continue;
    //
    //         $conditions[] = "{$col} = '{$val}'";
    //     }
    //
    //     $wrongNull = Array("= 'NULL'");
    //     $rightNull = Array("IS NULL");
    //     $rightCond = str_replace($wrongNull, $rightNull, $conditions);
    //
    //     return implode(" AND ", $rightCond);
    // }

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
