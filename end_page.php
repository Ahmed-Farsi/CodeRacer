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

    if (!empty($_GET["name"])) {
        $sql = "INSERT INTO leaderBoard (score, naam) VALUES(:score, :naam)";
        $pdo->prepare($sql)->execute([
            ':score' => $TPM,
            ':naam' => $_GET["name"]
        ]);
        header('Location: end_page.php?do=hidden');
    }
    
    ?>
    <!-- midden -->
    <h1 class = "title">Jouw score:</h1>
    <div class="mid">
        <div class = "mid_links">
            <?php
            if ($_GET["do"] !== "hidden") {
                echo <<<EOF
                    <div class = "mid_links_top">
                    <a href='end_page.php?do=hidden'><img class='cancel' src="icon/cancel.png"></a>
                    <form action="#" Method="GET">
                        <label for="name">jouw naam</label><br>
                        <input type="text" id="name" name="name"><br>
                        <input type="text" id="do" name="do" value="display" hidden>
                        <input type="submit" value="verzenden">
                    </form>
                    </div>
                EOF;
            } 
            ?>
            <div class = "mid_links_mid">
                <div class = "mid_links_klein">
                    <h2><?php echo 'aantal tekens'; ?></h2>
                    <h1><?php echo $aantal_tekens; ?></h1>
                </div>

                <div class = "mid_links_klein">
                    <h2><?php echo 'tijd'?></h2>
                    <h1><?php echo $_COOKIE['tijd']; ?></h1>
                    <p>Seconden</p>
                </div>

                <div class = "mid_links_klein">
                    <h2><?php echo 'TPM'?></h2>
                    <h1><?php echo $TPM; ?></h1>
                    <small>aantal tekens per minuut</small>
                </div>

                <div class = "mid_links_klein">
                <h2><?php
                    $result = $pdo->query('SELECT MAX(score) FROM leaderBoard');
                    While ($row = $result->fetch()) {
                    ?>
                        <h2><?php echo 'High Score'; ?></h2>
                        <h1><?php echo $row['MAX(score)']; ?></h1>
                    <?php
                    }  
                ?></h2>
                </div>
                </div>
            <?php
            if ($_GET["do"] == "hidden") {
            ?>
                <div class = "mid_links_onder">
                <h3>Code die is getypt
                <?php
                $result = $pdo->query('SELECT * FROM code WHERE id =' . $_COOKIE['id']);
                while ($row = $result->fetch()) {
                    echo'<pre><code>';
                    echo htmlspecialchars($row['text']);
                    echo'</code></pre>';
                }
                ?></h3>
                </div>
                <?php 
            }
            ?>
        </div>

        <div class = "mid_rechts">
                <h1 class = "title_lb">Leader Board</h1>
                <table class = 'leaderboard'>
                    <tr>
                        <th>Rank</th>
                        <th>Score(TPM)</th>
                        <th>name</th>
                    </tr>
                    <?php
                        $num = 0;
                        $result = $pdo->query('SELECT * FROM leaderBoard ORDER BY score DESC');
                        While ($row = $result->fetch()) {
                        $num += 1;
                        if ($num < 11) {
                        if ($row['score'] == $TPM) {
                        ?>
                            <tr class='me'>
                                <td><?php echo $num ?></td>
                                <td><?php echo $row['score'] ?></td>
                                <td><?php echo $row['naam'] ?></td>
                            </tr>
                        <?php
                        } else {
                        ?>
                            <tr>
                                <td><?php echo $num ?></td>
                                <td><?php echo $row['score'] ?></td>
                                <td><?php echo $row['naam'] ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                            
                        <?php
                            }
                        }
                    ?>
                </table>
                <div class="reset">
                <a href="game.php"><img class='reset' src="icon/reset.png"></a>
                </div>
        </div>
    </div>
    <br>
    <!-- footer -->
</body>
</html>