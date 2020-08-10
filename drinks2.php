<?php


$con = mysqli_connect("localhost", "johnab", "blacklime65", "johnab_canteen1");
if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL:".mysqli_connect_error(); die();}
else{
    echo "connected to database";

}

if(isset($_GET['drink'])) {
    $id = $_GET['drink'];

}else{
    $id = 1;
}

$this_drink_query = "SELECT PName, Cost, Calories, Stock, Description FROM drinks WHERE DrinkID = '" . $id .  "'";
$this_drink_result = mysqli_query($con, $this_drink_query);
$this_drink_record = mysqli_fetch_assoc($this_drink_result);

$all_drinks_query = "SELECT DrinkID, PName, Cost, Calories, Stock, Description FROM drinks";
$all_drinks_result = mysqli_query($con, $all_drinks_query);

?>

<!doctype html>
<html lang="en">

<head>

    <title> WGC Canteen | Drinks </title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="section">
    <div class="container1">
        <a href="index.php"><img class="logo" src="wgclogo.png" alt="WGC logo" width="200" height="200"></a>
    </div>
</div>
<h1>Drinks!</h1>
<p class="hug">Everyone welcome :)</p>

<nav class="clearfix">
    <a href="contactus.php">Contact us </a>
    <a href="specials.php">Specials </a>
    <a href="drinks2.php">Drinks </a>
    <a href="items.php">Food </a>
    <a href="index.php">Home</a>
</nav>

<main>
    <h2>Drinks Information</h2>

    <?php

    echo "<p> Drink Name: " . $this_drink_record['PName'] . "<br>";
    echo "<p> Cost: $" . $this_drink_record ['Cost'] . "<br>";
    echo "<p> Calories: " . $this_drink_record ['Calories'] . "<br>";
    echo "<p> Stock: " . $this_drink_record ['Stock'] . "<br>";
    echo "<p> Description: " . $this_drink_record ['Description'] . "<br>";
    ?>
</main>

<div class="coltxt">
    <h2>Select Another Drink</h2>

    <main>
        <form name='drinks_form' id='drinks_form'  method = 'get' action='drinks2.php'>
            <select id ='drink' name ='drink'>
                <?php
                while($all_drinks_record = mysqli_fetch_assoc($all_drinks_result)){
                    echo "<option value = '". $all_drinks_record['DrinkID'] . "'>";
                    echo $all_drinks_record['PName'];
                    echo "</option>";
                }
                ?>
            </select>
            <input type ='submit' name='drinks_button' value='Show me the drink information'>
        </form>
    </main>
</div>

<div class="coltxt">
    <h2> Search a Drink</h2>

    <form action="" method="post">
        <input type ="text" name="search">
        <input type ="submit" name="submit" value="Search">
    </form>
    <?php
    if(isset($_POST['search'])) {
        $search = $_POST['search'];

        $query1 = "SELECT * FROM drinks WHERE PName LIKE '%$search%'";
        $query = mysqli_query($con, $query1);
        $count = mysqli_num_rows($query);

        if($count ==0) {
            echo "There was no search results!";
        }else {

            while ($row = mysqli_fetch_array($query)) {
                echo $row ['PName'];
                echo "<br>";
            }

        }
    }
    ?>
</div>
</div>

</body>

</html>

