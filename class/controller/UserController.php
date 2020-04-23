<?php

class UserController extends WbController {

    public function insert($newModel){
        $col = implode(", ", $newModel->getColumns());
        $valArr = array_map(
            function ($x) { return $x == "NULL" ? $x : "'" . $x . "'"; },
            $newModel->getAllValues()
        );
        $val = implode(", ", $valArr);

        $sql = "INSERT INTO user ($col) VALUES ($val)";

        return mysqli_query($this->connection, $sql);
    }

    public function update($newModel){

    }

    public function delete(){

    }

    public function select(){

        $condition = $this->getPrimaryKeyCondition();
        $condition = is_null($condition) ? 1 : $condition;

        $user = new User();
        $col = implode(', ', $user->getColumns());

        $sql = "SELECT {$col} FROM user WHERE {$condition}";

        $result = mysqli_query($this->connection, $sql);
        $arrResult = Array();
        if (!$result) return $arrResult;
        $count = 0;
        if (mysqli_num_rows($result) > 0){
            while ($data = mysqli_fetch_array($result)){

                $user = new User();
                $user->setAllValues($data);

                $arrResult[$count] = $user;
                $count++;
            }
        }

        return $arrResult;
    }
}
