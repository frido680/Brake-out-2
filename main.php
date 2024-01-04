<?php
    session_start();
    include "conn.php";
            $sql = "SELECT * FROM users
            WHERE username = '" . $_SESSION['user_name'] . "'";
            $result = $conn->query($sql);
            if($result->num_rows > 0){
                $row = $result->fetch_assoc();
                $_SESSION["score"] = $row["score"];
            }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
    <link href="des.css" rel="stylesheet">
</head>
<body>
    <br>
    <br>
    <div class="panel">
        <h1> Szia <?php echo $_SESSION['user_name'] . "<br>Highscore: " . $_SESSION['score']?></h1>
        <br>
        <input type="button" onClick="location.href='game.php'" value="Game" class="btn-r">
        <br>
        <input type="button" onClick="location.href='https://github.com/frido680/Brake-out-2'" value="Github" class="btn-r mt-3">
        <br>
        <input type="button" onClick="location.href='logout.php'" value="Kilépés" class="btn-r mt-3">
    </div>
</body>
</html>