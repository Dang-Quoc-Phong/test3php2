<?php

namespace App\Models;
use App\Models\BaseModel;

class Task extends BaseModel  implements TaskInterface {

   public function getListTask() {
        $sql = "select * from tasks ";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    public function insertTask($name) {
        $sql = "INSERT INTO tasks (`name`) VALUE ('$name')";
        $this->setQuery($sql);
        $this->execute();
}
public function getDetailTask($id)
{
    $sql = "SELECT * FROM tasks WHERE id=$id";
    $this->setQuery($sql);
    return $this->loadRow();
}
public function updateTask( $name, $id="" ){
    if(!empty($id)) {

        $sql = "UPDATE tasks SET `name` = '$name' WHERE id=$id ";
    }else {
        $sql = "UPDATE tasks SET `name` = '$name' ";

    }
    $this->setQuery($sql);
    $this->execute();
}
public function deleteTask($id) {
    $sql = "DELETE FROM `tasks` WHERE id=$id";
    $this->setQuery($sql);
    $this->execute();
}
}
?>