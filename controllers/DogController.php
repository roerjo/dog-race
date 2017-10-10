<?php

class DogController
{
    public function add()
    {
        $name = htmlspecialchars($_REQUEST['name']);
        $team_id = htmlspecialchars($_REQUEST['team']);

        $dog = [
            'name' => $name,
            'team_id' => (int) $team_id,
        ];

        $query = new QueryBuilder;
         
        $query->insert('dogs', $dog);

        header('Location: /');
    }
} 


