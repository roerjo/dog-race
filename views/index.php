<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <title>Dog Race</title>

    <link rel="stylesheet" href="../public/css/main.css">

</head>

<body>

    <div class="container">

        <div class="row">
        
            <section id="addScores">

                <div id="round1">

                    <h2>Round 1</h2>

                    <form action="/scores" method="POST">

                    <?php foreach ($dogs as $dog) : ?>

                        <label for="score[<?= $dog->id; ?>]"><?= $dog->name; ?></label>
                        <input type="text" id="score[<?= $dog->id; ?>]" name="score[<?= $dog->id; ?>]" placeholder="Score"required/>

                        <input type="hidden" name="round" value="1">
                        
                    <?php endforeach; ?> 
                        
                    <button type="submit" class="enter">Submit Scores</button>

                    </form>

                </div>
                
                <div id="round2">

                    <h2>Round 2</h2>

                    <form action="/scores" method="POST">

                    <?php foreach ($dogs as $dog) : ?>

                        <label><?= $dog->name; ?></label>
                        <input type="text" name="score[<?= $dog->id; ?>]" placeholder="Score"required/>

                        <input type="hidden" name="round" value="2">
                        
                    <?php endforeach; ?> 
                        
                    <button type="submit" class="enter">Submit Scores</button>

                    </form>

                </div>
                
                <div id="round3">

                    <h2>Round 3</h2>

                    <form action="/scores" method="POST">

                    <?php foreach ($dogs as $dog) : ?>

                        <label><?= $dog->name; ?></label>
                        <input type="text" name="score[<?= $dog->id; ?>]" placeholder="Score"required/>

                        <input type="hidden" name="round" value="3">
                        
                    <?php endforeach; ?> 
                        
                    <button type="submit" class="enter">Submit Scores</button>

                    </form>

                </div>

            </section>

        </div>
        

        <section id="scores">
        
            <h2>Scores</h2>

            <p>Reseting the scores with set all scores back to 0</p>
            
            <form action="/scores/reset" method="POST">

                <button class="delete">Reset Scores</button>

            </form>

            <div class="row">
                    
                <div id="roundScores">            

                    <h4>Round Scores</h4>
                    
                    <table>
                        
                        <thead>
                            <tr>
                                <th>Team</th>
                                <th>Round</th>
                                <th>Score</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php foreach ($roundScores as $score) : ?>

                            <tr>    

                                <td><?= $score->name; ?></td>
                            
                                <td><?= $score->round; ?></td>

                                <td><?= $score->score; ?></td>
                            
                            </tr>

                            <?php endforeach; ?>

                        </tbody>

                    </table>

                </div>

                <div id="totalScores">

                    <h4>Total Scores</h4>
                    
                    <table>
                        
                        <thead>
                            <tr>
                                <th>Team</th>
                                <th>Total Score</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php foreach ($totalScores as $total) : ?>

                            <tr>    

                                <td><?= $total->name; ?></td>
                            
                                <td><?= $total->score; ?></td>

                            </tr>

                            <?php endforeach; ?>

                        </tbody>

                    </table>

                </div>

            </div>

        </section>

    </div>

</body>
</html>
