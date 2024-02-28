<?php
namespace App\Models;
interface TaskInterface {
    public function getListTask();
    public function insertTask($name);
    public function getDetailTask($id);
  
    public function  updateTask( $name, $id="" );
  
    public function deleteTask($id);
}
?>