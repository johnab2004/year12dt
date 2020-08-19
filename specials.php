<?php


$con = mysqli_connect("localhost", "johnab", "blacklime65", "johnab_canteen1");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL:" . mysqli_connect_error();
    die();
} else {
    echo "connected to database";

}

if (isset($_GET['special'])) {
    $id = $_GET['special'];

} else {
    $id = 1;
}


?>

<!doctype html>
<html lang="en">

<head>

    <title> WGC Canteen | Specials </title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="section">
    <div class="container1">
        <a href="index.php"><img class="logo" src="wgclogo.png" alt="WGC logo" width="200" height="200"></a>
    </div>
</div>
<h1>Specials!</h1>
<p class="hug">Everyone welcome :)</p>

<nav class="clearfix">
    <a href="specials.php">Specials </a>
    <a href="drinks2.php">Drinks </a>
    <a href="items.php">Food </a>
    <a href="index.php">Home</a>
</nav>

<form action="specials.php" method="post">
    <input type='submit' name='Monday' value="Monday"> <br>
    <input type='submit' name='Tuesday' value="Tuesday"> <br>
    <input type='submit' name='Wednesday' value="Wednesday"><br>
    <input type='submit' name='Thursday' value="Thursday"><br>
    <input type='submit' name='Friday' value="Friday"><br>

</form>

<table style="width:50%" class="table-stripped table-center0">
    <tr>
        <th>Weekday</th>
        <th>Food Special</th>
        <th>Drink Special</th>
    </tr>


    <?php
    if (isset($_POST['Monday'])) {
        $result = mysqli_query($con, "SELECT specials.DayID, item.IName, drinks.DName
         FROM specials, item, drinks WHERE specials.DayID = 'MON' 
         AND item.ItemID = specials.ItemID 
         AND drinks.DrinkID = specials.DrinkID");
        if (mysqli_num_rows($result) != 0) {
            while ($test = mysqli_fetch_array($result)) {
                $id = $test['DayID'];
                echo "<tr>";
                echo "<td>" . $test['DayID'] . "</td>";
                echo "<td>" . $test['IName'] . "</td>";
                echo "<td>" . $test['DName'] . "</td>";
                echo "</tr>";
            }
        }
    }

    if (isset($_POST['Tuesday'])) {
        $result = mysqli_query($con, "SELECT specials.DayID, item.IName, drinks.DName
         FROM specials, item, drinks WHERE specials.DayID = 'TUE' 
         AND item.ItemID = specials.ItemID 
         AND drinks.DrinkID = specials.DrinkID");
        if (mysqli_num_rows($result) != 0) {
            while ($test = mysqli_fetch_array($result)) {
                $id = $test['DayID'];
                echo "<tr>";
                echo "<td>" . $test['DayID'] . "</td>";
                echo "<td>" . $test['IName'] . "</td>";
                echo "<td>" . $test['DName'] . "</td>";
                echo "</tr>";
            }
        }
    }

    if (isset($_POST['Wednesday'])) {
        $result = mysqli_query($con, "SELECT specials.DayID, item.IName, drinks.DName
         FROM specials, item, drinks WHERE specials.DayID = 'WED' 
         AND item.ItemID = specials.ItemID 
         AND drinks.DrinkID = specials.DrinkID");
        if (mysqli_num_rows($result) != 0) {
            while ($test = mysqli_fetch_array($result)) {
                $id = $test['DayID'];
                echo "<tr>";
                echo "<td>" . $test['DayID'] . "</td>";
                echo "<td>" . $test['IName'] . "</td>";
                echo "<td>" . $test['DName'] . "</td>";
                echo "</tr>";
            }
        }
    }

    if (isset($_POST['Thursday'])) {
        $result = mysqli_query($con, "SELECT specials.DayID, item.IName, drinks.DName
         FROM specials, item, drinks WHERE specials.DayID = 'THU' 
         AND item.ItemID = specials.ItemID 
         AND drinks.DrinkID = specials.DrinkID");
        if (mysqli_num_rows($result) != 0) {
            while ($test = mysqli_fetch_array($result)) {
                $id = $test['DayID'];
                echo "<tr>";
                echo "<td>" . $test['DayID'] . "</td>";
                echo "<td>" . $test['IName'] . "</td>";
                echo "<td>" . $test['DName'] . "</td>";
                echo "</tr>";
            }
        }
    }

    if (isset($_POST['Friday'])) {
        $result = mysqli_query($con, "SELECT specials.DayID, item.IName, drinks.DName
         FROM specials, item, drinks WHERE specials.DayID = 'FRI' 
         AND item.ItemID = specials.ItemID 
         AND drinks.DrinkID = specials.DrinkID");
        if (mysqli_num_rows($result) != 0) {
            while ($test = mysqli_fetch_array($result)) {
                $id = $test['DayID'];
                echo "<tr>";
                echo "<td>" . $test['DayID'] . "</td>";
                echo "<td>" . $test['IName'] . "</td>";
                echo "<td>" . $test['DName'] . "</td>";
                echo "</tr>";
            }
        }
    }





    ?>


</body>

</html>

