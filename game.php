<?php
    session_start()
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Brake out!</title>
</head>
<body>
    <div class="bg-image"></div>
    <div class="container">
        <div class="row justify-content-center text-center ">
            <div class="col-12"><img id="logo" src="logo.png" alt=""></div>
        </div>
        <div class="row justify-content-center text-center">
            <div class="col-12 ">
                <canvas id="game" width="650" height="650"></canvas>
            </div>
        </div>
        <div class="row justify-content-center text-center">
            <div class="col-12">
                <button class="btn btn-warning" onclick="resetGame()">Reset Game</button>
                <button class="btn btn-warning" onclick="start()">Start</button>
                <button class="btn btn-warning" onclick="location.href='main.php'">Vissza</button>
            </div>
        </div>
    </div>
    <div class="d-none" id="userid"><?php echo $_SESSION["id"] ?></div>
    <script src="script.js"></script>
</body>
</html>