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
    <?php 
        session_start()
    ?>
<div class="panel">
        <fieldset>
            <form method="post">
            <div class="form-group row ">
                <label for="username">Felhasználónév</label>
                <div class="col-sm-20">
                <input type="text" class="form-control" name="username" placeholder="Felhasználónév" value="" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="pass">Jelszó</label>
                <div class="col-sm-20">
                    <input type="password" class="form-control" name="pass" placeholder="Jelszó" value="" required>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-20">
                    <div class="mt-3">
                        <button type="submit" class="btn-r" >Bejelentkezés</button>
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
            $login_username = $_POST['username'];
            $login_password = $_POST['pass'];
            $sql = "SELECT * FROM users
            WHERE username = '$login_username' AND pass = '$login_password'";
            $result = $conn->query($sql);
            if($result->num_rows > 0){
                $row = $result->fetch_assoc();
                echo "<div class='alert alert-success' role='alert'>" . 'Sikeres bejelentkezés!' .  "</div>";
                $_SESSION["user_name"] = $login_username;
                $_SESSION["id"] = $row["id"];
                $_SESSION["score"] = $row["score"];
                header("location: main.php");
            }
            else{
                echo "<div class='alert alert-danger' role='alert'>" . "Hibás Felhasználónév vagy Jelszó!" . "</div>";

            }
        }
        /*if (isset($_SESSION['login_error'])) {
               echo '<p class="error-message">' . $_SESSION['login_error'] . '</p>';
               unset($_SESSION['login_error']);
        }*/
?>
</body>
</html>