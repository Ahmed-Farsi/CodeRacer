<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/game.css">
    <script src="script.js" defer></script>
    <title>Type game</title>
</head>
<body>
    <div class="timer" id="timer">0</div>
    <div class="container">
        <div class="code-display" id="codeDisplay">Druk op de knop om te starten</div>
        <textarea hidden id="codeInput" class="code-input"></textarea> 
        <button  class="front-button-inner" onclick="startTimer();Hidecode()" >Start</button>
        <?php 
        include 'connect.php';
        if ($_GET['id'] == 'random') {
            $i = rand(1, 5);
            $result = $pdo->query('SELECT * FROM code WHERE id =' . $i);
        } else {
            $result = $pdo->query('SELECT * FROM code WHERE taal ="' . $_GET['id'] . '" ORDER BY RAND() LIMIT 1;');
        }
        while ($row = $result->fetch()) {
            setcookie('id', $row['id'], time() + (86400 * 30), "/");
            setcookie('taal', $row['taal'], time() + (86400 * 30), "/");
            ?>
        <pre id="text" hidden><code><?php echo htmlspecialchars($row['text']); 
        }?></code></pre>
    </div>   
</body>
</html>
