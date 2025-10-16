<?php

namespace App\Controllers;

use App\Models\Task;
use App\Utils\AbstractController;



class TaskController extends AbstractController
{
    public function addTask()
    { 
        require_once(__DIR__ . "/../Views/addTask.view.php");
    }
       
    
}