<?php

class DogController
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
        $team_id = htmlspecialchars($_REQUEST['team']);

        $dog = [
            'name' => $name,
            'score' => 0,
            'team_id' => (int) $team_id,
        ];

        $query = new QueryBuilder;
         
        $query->insert('dogs', $dog);

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


