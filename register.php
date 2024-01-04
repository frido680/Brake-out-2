<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="des.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
  </div>
    <div class="panel">
        <fieldset>
            <form method="post">
            <div class="form-group row">
                <label for="EmailAddress">Email</label>
                <div class="col-sm-20">
                <input type="email" class="form-control" name="EmailAddress" id="EmailAddress" placeholder="Email" required>
                </div>
            </div>
            <div class="form-group row ">
                <label for="username">Felhasználónév</label>
                <div class="col-sm-20">
                <input type="text" class="form-control" name="username" id="username" placeholder="Felhasználónév" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="pass">Jelszó</label>
                <div class="col-sm-20">
                    <input type="password" class="form-control" name="pass" id="pass" placeholder="Jelszó" required>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-20">
                    <div class="mt-3">
                        <button type="submit" class="btn-r">Regisztáció</button>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-20">
                    <div class="mt-3">
                        <button type="button" onClick="location.href='index.html'" class="btn-r">Vissza</button>
                    </div>
                </div>
            </div>
            </form>
        </fieldset>
    </div>
    <?php
        //piecspi
        include "conn.php";
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $Register_UserPassword = $_POST['pass'];
            $Register_UserUsername = $_POST['username'];
            $Register_UserEmail = $_POST['EmailAddress'];
            if(strlen($Register_UserUsername) < 3){
                echo "<div class='alert alert-danger' role='alert'>" . "A Felhasználónévnek legalább 3 karakternek kell lenni" . "</div>";
            }
            else if(strlen($Register_UserPassword) < 5){
                echo "<div class='alert alert-danger' role='alert'>" . "A jelszavadnak legalább 5 karakternek kell lenni" . "</div>";
            }
            else{
                $sql = "SELECT pass, email FROM users 
                WHERE pass = '$Register_UserPassword' OR email = '$Register_UserEmail'";
                $result = $conn->query($sql);
                if($result->num_rows > 0){
                    echo "<div class='alert alert-danger' role='alert'>" . "Az email cím vagy jelszó már foglalt" . "</div>";
                }
                else{
                    echo "<div class='alert alert-success' role='alert'>" . 'Sikeres regisztráció!' .  "</div>";
                    $sql = "INSERT INTO users (username, pass, email) VALUES ('$Register_UserUsername', '$Register_UserPassword', '$Register_UserEmail')";
                    $conn->query($sql);
                }
            }
        }
    ?>
</body>
</html>