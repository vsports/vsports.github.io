<?php
// starting sessions 
ob_start();
session_start();

// establishing connection with database 
include "assets/php/db-config.php";

// getting data from the popup registration form
if(isset($_POST["register"]))
{
    // getting data storing in php variables
    $team_name = $_POST["teamname"];
    $contact = $_POST["contact"];
    $captain = $_POST["captain"];
    $vcaptain = $_POST["vice"];
    $player1 = $_POST["player1"];
    $player2 = $_POST["player2"];
    $player3 = $_POST["player3"];
    $player4 = $_POST["player4"];
    $player5 = $_POST["player5"];
    $player6 = $_POST["player6"];

    // cheking if the credential matches one of our database
    $sql = "SELECT * FROM team_registration WHERE contact=$contact";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    
    if(mysqli_num_rows($result) != 0)
    {
        $_SESSION["msg"] = "info";
        header("location:index.php");
        exit;
    }

    // if false putting data to the our database
    else
    {
        $query = mysqli_query($db, "INSERT INTO team_registration (teamname, contact, captain, vcaptain, player1, player2, player3, player4, player5, player6) VALUES ('$team_name', '$contact', '$captain', '$vcaptain', '$player1', '$player2', '$player3', '$player4', '$player5', '$player6')");
        if($query){
            $_SESSION["msg"] = "register";
            header("location:index.php");
            die();
        }
    }
}

// getting data from the contact form
else if(isset($_POST["contact"]))
{

    // getting data storing in php variables
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // sending contact information
    $query = mysqli_query($db, "INSERT INTO contact (name, email, message) VALUES ('$name', '$email', '$message')");

    if($query)
    {
        $_SESSION["msg"] = "contact";
        mail($email,"Victory Hello","Hi ".$name."! Thanks for reaching out, This is an auto generated reply, we'll be back to you soon.","Victory");
        header("location:index.php");
        die();
    }
}

?>