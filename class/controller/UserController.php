<?php

class UserController extends WbController {

    public function insert($newModel){
        $colArr = $newModel->getColumns();
        $valArr = array_map(
            function ($x) { return $x == "NULL" ? $x : "'" . $x . "'"; },
            $newModel->getAllValues()
        );

        array_shift($valArr);
        array_shift($colArr);

        $col = implode(", ", $colArr);
        $val = implode(", ", $valArr);

        return WbController::executeInsertQuery('user', $col, $val);
    }

    public function update($newModel){
        $colArr = $newModel->getColumns();
        $valArr = $newModel->getAllValues();
        $setterArr = array_map(
            function ($col, $val) {
                $v = $val == "NULL" ? $val : "'" . $val . "'";
                return "{$col} = {$v}";
            }, $colArr, $valArr
        );

        array_shift($setterArr);

        $setter = implode(", ", $setterArr);

        $condition = 0;
        if (!is_null($this->getModel()))
            $condition = $this->getModel()->getConditions();

        return WbController::executeUpdateQuery('user', $setter, $condition);
    }

    public function delete(){

    }

    public function select(){

        $condition = $this->getPrimaryKeyCondition();
        $condition = is_null($condition) ? 1 : $condition;

        $user = new User();
        $col = implode(', ', $user->getColumns());

        $result = WbController::executeSelectQuery($col, 'user', $condition);

        $arrResult = WbController::getArrayFromQueryResult($result, 'User');

        return $arrResult;
    }
}
