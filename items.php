<?php


$con = mysqli_connect("localhost", "johnab", "blacklime65", "johnab_canteen1");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL:" . mysqli_connect_error();
    die();
} else {
    echo "connected to database";

}

if (isset($_GET['item'])) {
    $id = $_GET['item'];

} else {
    $id = 1;
}

$this_item_query = "SELECT ItemID, IName, Cost, Calories, Stock, Description FROM item WHERE ItemID = '" . $id . "'";
$this_item_result = mysqli_query($con, $this_item_query);
$this_item_record = mysqli_fetch_assoc($this_item_result);

$all_items_query = "SELECT ItemID, IName, Cost, Calories, Stock, Description FROM item";
$all_items_result = mysqli_query($con, $all_items_query);

?>

<!doctype html>
<html lang="en">

<head>

    <title> WGC Canteen | Food </title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="section">
    <div class="container1">
        <a href="index.php"><img class="logo" src="wgclogo.png" alt="WGC logo" width="200" height="200"></a>
    </div>
</div>
<h1>Food Items!</h1>
<p class="hug">Everyone welcome :)</p>

<nav class="clearfix">
    <a href="specials.php">Specials </a>
    <a href="drinks2.php">Drinks </a>
    <a href="items.php">Food </a>
    <a href="index.php">Home</a>

</nav>

<main>
    <h2>Item Information</h2>

    <?php

    echo "<p> Item Name: " . $this_item_record['IName'] . "<br>";
    echo "<p> Cost: $" . $this_item_record ['Cost'] . "<br>";
    echo "<p> Calories: " . $this_item_record ['Calories'] . "<br>";
    echo "<p> Stock: " . $this_item_record ['Stock'] . "<br>";
    echo "<p> Description: " . $this_item_record ['Description'] . "<br>";
    ?>
</main>

<hr>

<div class="coltxt">
    <h2>Select Another Item</h2>

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
    </main>
</div>

<hr>

<div class="coltxt">
    <h2> Search a Item</h2>

    <form action="" method="post">
        <input type="text" name="search">
        <input type="submit" name="submit" value="Search">
    </form>
    <?php
    if (isset($_POST['search'])) {
        $search = $_POST['search'];

        $query1 = "SELECT * FROM item WHERE IName LIKE '%$search%'";
        $query = mysqli_query($con, $query1);
        $count = mysqli_num_rows($query);

        if ($count == 0) {
            echo "There was no search results!";
        }
        elseif ($search == ""){
            echo "There was no search results!";
        }
        else{


            while ($row = mysqli_fetch_array($query)) {
                echo $row ['IName'];
                echo "<br>";
            }

        }
    }
    ?>
</div>

<hr>

<h2>Food Menu</h2>

<div class="filter">

    <h3>Filter Menu</h3>

    <form action="items.php" method="post">
        <input type='submit' name='A-Z' value="Product Name A-Z"> <br>
        <input type='submit' name='Z-A' value="Product Name Z-A"> <br>
        <input type='submit' name='low_to_high' value="Price Low - High"><br>
        <input type='submit' name='high_to_low' value="Price High - Low"><br>
        <input type='submit' name='cal_low_to_high' value="Calories Low - High"><br>
        <input type='submit' name='cal_high_to_low' value="Calories High - Low"><br>
        <input type='submit' name='stock_low_to_high' value="Stock Low - High"><br>
        <input type='submit' name='stock_high_to_low' value="Stock High - Low"><br>
    </form>

</div>

<table style="width:50%" class="table-stripped table-center ml-40 mr-40">
    <tr>
        <th>Product Name </th>
        <th>Price</th>
        <th>Calories</th>
        <th>Stock</th>

    </tr>


    <?php
    if (isset($_POST['A-Z'])) {
        $result = mysqli_query($con, "SELECT * FROM item ORDER BY IName ASC");
        if (mysqli_num_rows($result) != 0) {
            while ($test = mysqli_fetch_array($result)) {
                $id = $test['ItemID'];
                echo "<tr>";
                echo "<td>" . $test['IName'] . "</td>";
                echo "<td>" . $test['Cost'] . "</td>";
                echo "<td>" . $test['Calories'] . "</td>";
                echo "<td>" . $test['Stock'] . "</td>";


                echo "</tr>";
            }
        }
    }


    if (isset($_POST['Z-A'])) {
        $result = mysqli_query($con, "SELECT * FROM item ORDER BY IName DESC");
        if (mysqli_num_rows($result) != 0) {
            while ($test = mysqli_fetch_array($result)) {
                $id = $test['ItemID'];
                echo "<tr>";
                echo "<td>" . $test['IName'] . "</td>";
                echo "<td>" . $test['Cost'] . "</td>";
                echo "<td>" . $test['Calories'] . "</td>";
                echo "<td>" . $test['Stock'] . "</td>";

                echo "</tr>";
            }
        }
    }


    if (isset($_POST['low_to_high'])) {
        $result = mysqli_query($con, "SELECT * FROM item ORDER BY Cost ASC");
        if (mysqli_num_rows($result) != 0) {
            while ($test = mysqli_fetch_array($result)) {
                $id = $test['ItemID'];
                echo "<tr>";
                echo "<td>" . $test['IName'] . "</td>";
                echo "<td>" . $test['Cost'] . "</td>";
                echo "<td>" . $test['Calories'] . "</td>";
                echo "<td>" . $test['Stock'] . "</td>";

                echo "</tr>";
            }
        }
    }


    if (isset($_POST['high_to_low'])) {
        $result = mysqli_query($con, "SELECT * FROM item ORDER BY Cost DESC");
        if (mysqli_num_rows($result) != 0) {
            while ($test = mysqli_fetch_array($result)) {
                $id = $test['ItemID'];
                echo "<tr>";
                echo "<td>" . $test['IName'] . "</td>";
                echo "<td>" . $test['Cost'] . "</td>";
                echo "<td>" . $test['Calories'] . "</td>";
                echo "<td>" . $test['Stock'] . "</td>";

                echo "</tr>";
            }
        }
    }

    if (isset($_POST['cal_low_to_high'])) {
        $result = mysqli_query($con, "SELECT * FROM item ORDER BY Calories ASC");
        if (mysqli_num_rows($result) != 0) {
            while ($test = mysqli_fetch_array($result)) {
                $id = $test['ItemID'];
                echo "<tr>";
                echo "<td>" . $test['IName'] . "</td>";
                echo "<td>" . $test['Cost'] . "</td>";
                echo "<td>" . $test['Calories'] . "</td>";
                echo "<td>" . $test['Stock'] . "</td>";

                echo "</tr>";
            }
        }
    }

    if (isset($_POST['cal_high_to_low'])) {
        $result = mysqli_query($con, "SELECT * FROM item ORDER BY Calories DESC");
        if (mysqli_num_rows($result) != 0) {
            while ($test = mysqli_fetch_array($result)) {
                $id = $test['ItemID'];
                echo "<tr>";
                echo "<td>" . $test['IName'] . "</td>";
                echo "<td>" . $test['Cost'] . "</td>";
                echo "<td>" . $test['Calories'] . "</td>";
                echo "<td>" . $test['Stock'] . "</td>";

                echo "</tr>";
            }
        }
    }

    if (isset($_POST['stock_low_to_high'])) {
        $result = mysqli_query($con, "SELECT * FROM item ORDER BY Stock ASC");
        if (mysqli_num_rows($result) != 0) {
            while ($test = mysqli_fetch_array($result)) {
                $id = $test['ItemID'];
                echo "<tr>";
                echo "<td>" . $test['IName'] . "</td>";
                echo "<td>" . $test['Cost'] . "</td>";
                echo "<td>" . $test['Calories'] . "</td>";
                echo "<td>" . $test['Stock'] . "</td>";

                echo "</tr>";
            }
        }
    }

    if (isset($_POST['stock_high_to_low'])) {
        $result = mysqli_query($con, "SELECT * FROM item ORDER BY Stock DESC");
        if (mysqli_num_rows($result) != 0) {
            while ($test = mysqli_fetch_array($result)) {
                $id = $test['ItemID'];
                echo "<tr>";
                echo "<td>" . $test['IName'] . "</td>";
                echo "<td>" . $test['Cost'] . "</td>";
                echo "<td>" . $test['Calories'] . "</td>";
                echo "<td>" . $test['Stock'] . "</td>";

                echo "</tr>";
            }
        }
    }


    ?>


</table>

</body>

</html>

