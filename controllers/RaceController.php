<?php

class RaceController
{
    public function index()
    {
        $query = new QueryBuilder;
        
        $teams = $query->all('teams');
        $dogs = $query->all('dogs');
        $roundScores = $query->getScores();
        $totalScores = $query->getTotals();

        require 'views/index.php'; 
    }


    public function add()
    {
        $round = $_REQUEST['round'];
        
        $query = new QueryBuilder;

        foreach ($_REQUEST['score'] as $dog_id => $score) {

            $entry = [
                'dog_id' => (int) $dog_id,
                'score' => (int) $score,
                'round' => (int) $round,
            ];
            
            $query->insert('scores', $entry);
        
        }

        header('Location: /');
    }

    public function delete()
    {
        $query = new QueryBuilder;

        $query->delete('scores');

        header('Location: /');
    }
} 
