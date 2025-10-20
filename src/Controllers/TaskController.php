<?php

namespace App\Controllers;

use App\Models\Task;
use App\Utils\AbstractController;

class TaskController extends AbstractController
{
    public function addTask()
    {
        if (isset($_POST['addTask'])) {
            $title = htmlspecialchars($_POST['title']);
            $description = htmlspecialchars($_POST['description']);
            $status = htmlspecialchars($_POST['status']);

            $this->totalCheck('title', $title);
            $this->totalCheck('description', $description);
            $this->totalCheck('status', $status);

            //$this->debug($this->arrayError);

            if (empty($this->arrayError)) {
                $today = date("Y-m-d");
                $task = new Task(null, $title, $description, $status, $today, null);
                $task->saveTask();
                $this->redirectToRoute('/', 200);
            }
        }
        require_once(__DIR__ . "/../Views/formTask.view.php");
    }

    public function showTask()
    {
        if(isset($_GET['id'])){
            $id = htmlspecialchars($_GET['id']);
            $task = new Task($id, null, null, null, null, null);
            $tasks = $task->getTaskById();

                 require_once(__DIR__ . "/../Views/showTask.view.php");
        }else{
            $this->redirectToRoute('/', 302);
        }

    }

    public function editTask()
    {
        if (isset($_POST['editTask'])) {
            $id = htmlspecialchars($_GET['id']);
            $title = htmlspecialchars($_POST['title']);
            $description = htmlspecialchars($_POST['description']);
            $status = htmlspecialchars($_POST['status']);

            $this->totalCheck('title', $title);
            $this->totalCheck('description', $description);
            $this->totalCheck('status', $status);

            if (empty($this->arrayError)) {

                $id = htmlspecialchars($_GET['id']);
                $task = new Task($id, null, null, null, null, null);
                $tasks = $task->getTaskById();
            }
        }
        require_once(__DIR__ . "/../Views/editTask.view.php");
    }
}