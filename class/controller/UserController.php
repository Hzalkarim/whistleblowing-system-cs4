<?php

class UserController extends WbController {

    public function insert($newModel){
        $col = implode(", ", $newModel->getColumns());
        $valArr = array_map(
            function ($x) { return $x == "NULL" ? $x : "'" . $x . "'"; },
            $newModel->getAllValues()
        );
        $val = implode(", ", $valArr);

        return WbController::executeInsertQuery('user', $col, $val);
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

        $result = WbController::executeSelectQuery($col, 'user', $condition);

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
