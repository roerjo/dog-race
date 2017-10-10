<?php

class TeamController
{

    public function index()
    {
        
        $query = new QueryBuilder;
        
        $tasks = $query->all('teams');

        require 'views/index.php'; 

    }


    public function add()
    {
        $name = htmlspecialchars($_REQUEST['name']);

        $team = [
            'name' => $name,
            'score' => 0,
        ];

        $query = new QueryBuilder;
         
        $query->insert('teams', $team);

        header('Location: /');

    }

    public function delete($id)
    {
        
        $query = new QueryBuilder;

        $query->delete('tasks', $id);

        header('Location: /');

    }

    public function update($id)
    {

        $query = new QueryBuilder;
        
        $dateFormat = 'Y-m-d';

        $date = date($dateFormat);
        
        $task = [
            'dateCompleted' => $date,
        ];

        $query->update('tasks', $task, $id);

        header('Location: /');

    }

} 

