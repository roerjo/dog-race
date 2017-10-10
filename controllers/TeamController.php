<?php

class TeamController
{
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
} 
