<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/end.css">
    <title>Results</title>
</head>
<body>
    <?php
    include 'connect.php';
    include 'berekening.php';
    if ($TPM != $_COOKIE["user"]) {
        $sql = "INSERT INTO leaderboard (score) VALUES(:score)";
        $pdo->prepare($sql)->execute([
            ':score' => $TPM
        ]);
    }  
    ?>
    <!-- midden -->
    <h1 class = "title">Jouw score:</h1>
    <div class="mid">
        <div class = "mid_links">
            <div class = "mid_links_klein">
                <h2><?php echo 'aantal tekens'; ?></h2>
                <h1><?php echo $aantal_tekens; ?></h1>
            </div>

            <div class = "mid_links_klein">
            <h2><?php echo 'TPM'?></h2>
            <h1><?php echo $TPM; ?></h1>
            </div>

            <div class = "mid_links_klein">
            <h2><?php
                $result = $pdo->query('SELECT MAX(score) FROM leaderboard');
                While ($row = $result->fetch()) {
                ?>
                    <h2><?php echo 'High Score'; ?></h2>
                    <h1><?php echo $row['MAX(score)']; ?></h1>
                <?php
                }  
            ?></h2>
            </div>

            <div class = "mid_links_klein">
                <h2><?php echo 'tijd'?></h2>
                <h1><?php echo $_COOKIE['tijd']; ?></h1>
                <p>Seconden</p>
            </div>
        </div>

        <div class = "mid_rechts">
                <h1 class = "title_lb">Leader Board</h1>
                <table class = 'leaderboard'>
                    <tr>
                        <th>Rank</th>
                        <th>Score(TPM)</th>
                    </tr>
                    <?php
                        $num = 0;
                        $result = $pdo->query('SELECT * FROM leaderboard ORDER BY score DESC');
                        While ($row = $result->fetch()) {
                        $num += 1;
                        if ($row['score'] == $TPM) {
                        ?>
                            <tr class='me'>
                                <td><?php echo $num ?></td>
                                <td><?php echo $row['score'] ?></td>
                            </tr>
                        <?php
                        } else {
                        ?>
                            <tr>
                                <td><?php echo $num ?></td>
                                <td><?php echo $row['score'] ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                            
                        <?php
                            }
                    ?>
                </table>
        </div>
    </div>
    <br>
    <!-- footer -->
    <div class="reset">
        <a href="index.php"><img src="icon/reset.png"></a>
    </div>
</body>
</html>