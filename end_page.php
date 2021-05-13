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
    <!-- top -->
    <div class="top">
        <div class="menu">
            <img src="icon/menu.png">
            <p>Menu<p>
        </div>
        <div class="user">
            <img src="icon/usericon.png">
            <p>account</p>
        </div>
    </div>
    <?php
    include 'berekening.php';
    ?>
    <!-- midden -->
    <h1 class = "title">Jouw score:</h1>
    <div class="mid">
        <div class = "mid_links">
            <h2 class = "score"><?php
                echo 'aantal tekens: ' . $aantal_tekens;
                echo '<br>';
                echo 'TMP: ' . $TMP;
            ?></h2>
            <!-- <p><?php echo $tekens ?></P> -->
        </div>

        <div class = "mid_rechts">
            <div class = "mid_rechts_een">
            </div> 
            <div class = "mid_rechts_twee">
            </div>  
        </div>
    </div>
</body>
</html>