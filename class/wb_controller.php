<?php

abstract class WbController
{
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $dbname = "whistleblowing_system_2";
    private $model;
    public $connection;

    protected static $stConnection;

    function __construct(){
        // $conn = mysqli_connect($this->host, $this->user, $this->password);
        // $dbselect = mysqli_select_db($conn, $this->dbname);
        // $this->connection = $conn;
        if (is_null(WbController::$stConnection))
            WbController::create();
    }

    public static function create(){
        $conn = mysqli_connect('localhost', 'root', '');
        $dbselect = mysqli_select_db($conn, 'whistleblowing_system_2');
        WbController::$stConnection = $conn;
    }

    public abstract function insert($model);
    public abstract function update($model);
    public abstract function delete();
    public abstract function select();

    public function selectOne(){
        $result = $this->select();
        if (!is_null($result) && count($result) > 0)
            return $result[0];
    }

    protected function getModel(){
        return $this->model;
    }

    #set model for conditions
    public function where($model){
        $this->model = $model;
        return $this;
    }

    #static function region
    public static function executeSelectQuery($col, $from, $where) {

        $sql = "SELECT {$col} FROM {$from} WHERE {$where}";
        return mysqli_query(WbController::$stConnection, $sql);
    }

    public static function executeInsertQuery($into, $col, $val) {

        $sql = "INSERT INTO {$into} ({$col}) VALUES ({$val})";
        return mysqli_query(WbController::$stConnection, $sql);
    }

    public static function executeUpdateQuery($update, $set, $where){
        $sql = "UPDATE {$update} SET {$set} WHERE {$where}";
        return mysqli_query(WbController::$stConnection, $sql);
    }

    public static function getArrayFromQueryResult($result, $className) {

        if (!$result) return NULL;
        $arrResult = Array();
        $count = 0;
        if (mysqli_num_rows($result) > 0){
            while ($data = mysqli_fetch_array($result)){

                $mhs = new $className();
                $mhs->setAllValues($data);

                $arrResult[$count] = $mhs;
                $count++;
            }
        }

        return $arrResult;
    }

    public static function getArrayWithForeignModelFromQueryResult($result, $modelClassNameArray) {

        if (!$result) return NULL;

        $arrResult = Array();
        $count = 0;
        if (mysqli_num_rows($result) > 0){
            while ($data = mysqli_fetch_array($result)){

                $modelClass = Array();
                $dataSlice = Array();
                $start = 0;
                foreach ($modelClassNameArray as $className => $colCount) {
                    $modelClass[] = new $className();
                    $dataSlice[] = array_slice($data, $start, $colCount);
                    $start += $colCount;
                }

                $fkArray = Array();
                for ($i = 0; $i < count($modelArray); $i++) {
                    $modelClass[$i]->setAllValues($dataSlice[$i]);
                    if ($i > 0) {
                        $fkArray[get_class($modelClass[$i])] = $modelClass[$i];
                    }
                }

                $modelClass[0]->setForeignModel($fkModel);

                $arrResult[$count] = $modelClass[0];
                $count++;
            }
        }

        return $arrResult;
    }
}
