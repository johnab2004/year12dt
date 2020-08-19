<?php


$con = mysqli_connect("localhost", "johnab", "blacklime65", "johnab_canteen1");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL:" . mysqli_connect_error();
    die();
} else {
    echo "connected to database";

}

// drinks query to populate the dropdown form
$all_drinks_query = "SELECT DrinkID, Cost, Calories, Stock, Description, DName FROM drinks";
$all_drinks_result = mysqli_query($con, $all_drinks_query);

// items query to populate the dropdown form
$all_items_query = "SELECT ItemID, IName, Cost, Calories, Stock, Description FROM item";
$all_items_result = mysqli_query($con, $all_items_query);


?>


<!doctype html>
<html lang="en">

<head>

    <title> WGC Canteen | Home </title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="section">
    <div class="container1">
        <a href="index.php"><img class="logo" src="wgclogo.png" alt="WGC logo" width="200" height="200"></a>
    </div>
</div>
<h1>WGC canteen</h1>
<p class="hug">Everyone welcome :)</p>

<nav class="clearfix">
    <a href="specials.php">Specials </a>
    <a href="drinks2.php">Drinks </a>
    <a href="items.php">Food </a>
    <a href="index.php">Home</a>
</nav>
<div>

    <div class="section divider-home"></div>
    <div class="section">
        <div class="container">

        </div>
    </div>
</div>

<div class="section divider-1"></div>
<div class="section clearfix">
    <div class="container">

        <div class="coltxt">
            <h2>Food</h2>

    <main>
                <form name='items_form' id='items_form' method='get' action='items.php'>
                    <select id='item' name='item'>
                        <?php
                        while ($all_items_record = mysqli_fetch_assoc($all_items_result)) {
                            echo "<option value = '" . $all_items_record['ItemID'] . "'>";
                            echo $all_items_record ['IName'];
                            echo "</option>";
                        }
                        ?>

                    </select>
                    <input type='submit' name='items_button' value='Show me the items information'>
                </form>
        </div>
    </div>
</div>
</div>


<div class="section divider-2"></div>
<div class="section clearfix">
    <div class="container">

        <div class="coltxt">
            <h2>Drinks</h2>

            <form name='drinks_form' id='drinks_form' method='get' action='drinks2.php'>
                <select id='drink' name='drink'>
                    <?php
                    while ($all_drinks_record = mysqli_fetch_assoc($all_drinks_result)) {
                        echo "<option value = '" . $all_drinks_record['DrinkID'] . "'>";
                        echo $all_drinks_record['DName'];
                        echo "</option>";
                    }
                    ?>
                </select>
                <input type='submit' name='drinks_button' value='Show me the drink information'>
            </form>


            <div class="section divider-4"></div>
            <div class="section clearfix">
                <div class="container">
                    <div class="coltxt">
                        <h2>Specials</h2>
                        <p>To see the specials for an day of the week <a href="specials.php">click here</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

</main>

</body>

</html>
