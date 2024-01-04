<?php
include "conn.php";
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $request = explode(";", $_REQUEST["p"]);
    $id = $request[0];
    $score = $request[1];
    $sql = "SELECT * FROM users
            WHERE id = '$id'";
            $result = $conn->query($sql);
            if($result->num_rows > 0){
                $row = $result->fetch_assoc();
                $HighScore = $row["score"];
                if($score > $HighScore){
                    $sql = "UPDATE users SET score = " . $score . " WHERE id like '" . $id  . "'";
                    $result = $conn->query($sql);
                }
            }
}
?>