<?php

namespace App\Controllers;

use Core\App;

class TasksController {
    public function index()
    {
        $tasks = App::get('database')->fetchAll('tasks');
        return view('tasks', compact('tasks'));
    }

    public function store()
    {
        $task = $_POST['task'];
        $completed = isset($_POST['completed']);

        App::get('database')->insert('tasks', ['task' => $task, 'completed' => intval($completed)]);
        return redirect('tasks');
    }
}
