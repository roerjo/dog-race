<?php

require 'Connection.php';

class QueryBuilder
{
    
    private $pdo;

    public function __construct()
    {
   
        $this->pdo = Connection::make();
   
    }

    public function all($table)
    {
   
        try {
   
            $statement = $this->pdo->prepare("SELECT * FROM {$table}");

            $statement->execute();

            return $statement->fetchAll(PDO::FETCH_CLASS);
   
        } catch (Exception $e) {
   
            die(var_dump($e->getMessage()));
   
        }
   
    }

    public function insert($table, $values)
    {
   
        $sql = sprintf(
            "INSERT INTO %s (%s) VALUES(%s)",
            $table,
            implode(', ', array_keys($values)),
            ':' . implode(', :', array_keys($values))
        );

        try {

            $statement = $this->pdo->prepare($sql);

            $statement->execute($values);
        
        } catch (Exception $e) {
        
            die(var_dump($e->getMessage()));
        
        }
    
    }

    public function delete()
    {
        try {
    
            $statement = $this->pdo->prepare(
                "truncate table scores"
            );

            $statement->execute();
    
        } catch (Exception $e) {
    
            die(var_dump($e->getMessage()));
    
        }
    }

    public function getScores()
    {
        try {
    
            $sql = "select 
                        teams.name, 
                        max(scores.round) as round, 
                        sum(scores.score) as score 
                    from teams
                    join dogs on dogs.team_id = teams.id
                    join scores on scores.dog_id = dogs.id

                    group by scores.round, teams.name";
            
            $statement = $this->pdo->prepare($sql);
           
            $statement->execute();
            
            return $statement->fetchAll(PDO::FETCH_CLASS);
    
        } catch (Exception $e) {
    
            die(var_dump($e->getMessage()));
    
        }
    }
    
    public function getTotals()
    {
        try {
    
            $sql = "select 
                        teams.name, 
                        sum(scores.score) as score 
                    from teams
                    join dogs on dogs.team_id = teams.id
                    join scores on scores.dog_id = dogs.id

                    group by teams.name";
            
            $statement = $this->pdo->prepare($sql);
           
            $statement->execute();
            
            return $statement->fetchAll(PDO::FETCH_CLASS);
    
        } catch (Exception $e) {
    
            die(var_dump($e->getMessage()));
    
        }
    }
}
