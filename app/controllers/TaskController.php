<?php

namespace App\Controllers;

use App\Models\Task;

class TaskController extends BaseController
{
    private $task;
    public function __construct()
    {
        $this->task = new Task();
    }
    public function getTask()
    {
        $tasks = $this->task->getListTask();
        return $this->render('task.index', compact('tasks'));
    }
    public function addTask()
    {
        if (!empty($_SESSION['msg'])) {
            $msg = $_SESSION['msg'];
        } else {
            $msg = null;
        }
        if (!empty($_SESSION['msg_type'])) {
            $msg_type = $_SESSION['msg_type'];
        } else {
            $msg_type = null;
        }
        if (!empty($_SESSION['errors'])) {
            $errors = $_SESSION['errors'];
        } else {
            $errors = null;
        }
        if (!empty($_SESSION['old'])) {
            $old = $_SESSION['old'];
        } else {
            $old = null;
        }

        session_destroy();
        return $this->render('task.add',  compact('msg', 'msg_type', 'errors', 'old'));
    }
    public function postTask()
    {
        $errors = [];
        if (empty($_POST['name'])) {
            $errors['name'] = 'Cong viec khong de trong';
        }
       

        if (empty($errors)) {
            $name = $_POST['name'];
          
            $this->task->insertTask($name);

            $_SESSION['msg'] = 'Them cong viec thanh cong!';
            $_SESSION['msg_type'] = 'success';
        } else {
            $_SESSION['msg'] = 'co loi xay ra, vui long kiem tra lai!';
            $_SESSION['msg_type'] = 'danger';
            $_SESSION['errors'] = $errors;
            $_SESSION['old'] = $_POST;
        }
        header("Location: add-task");
    }
    public function editTask($id)
    {
        if (!empty($_SESSION['msg'])) {
            $msg = $_SESSION['msg'];
        } else {
            $msg = null;
        }
        if (!empty($_SESSION['msg_type'])) {
            $msg_type = $_SESSION['msg_type'];
        } else {
            $msg_type = null;
        }
        if (!empty($_SESSION['errors'])) {
            $errors = $_SESSION['errors'];
        } else {
            $errors = null;
        }
        session_destroy();

        $taskDetail = $this->task->getDetailTask($id);
        return $this->render('task.edit',  compact('msg', 'msg_type', 'errors', 'taskDetail'));
    }
    public function postEdit($id)
    {
        $errors = [];
        if (empty($_POST['name'])) {
            $errors['name'] = 'Cong viec khong duoc de trong';
        }
       

        if (empty($errors)) {
            $name = $_POST['name'];
           
            
            $this->task->updateTask($name, $id);

            $_SESSION['msg'] = 'Cap nhan cong viec thanh cong!';
            $_SESSION['msg_type'] = 'success';
        } else {
            $_SESSION['msg'] = 'co loi xay ra, vui long kiem tra lai!';
            $_SESSION['msg_type'] = 'danger';
            $_SESSION['errors'] = $errors;
            $_SESSION['old'] = $_POST;
        }
        header("Location: " . BASE_URL . 'edit-task/' . $id);
    }
    public function deleteTask($id) {
        $this->task->deleteTask($id);
        header("Location: " . BASE_URL . 'list-task');
    }
}