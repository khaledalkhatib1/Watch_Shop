<?php
    $con = mysqli_connect("localhost", "root", "liu2017")
    or die("Could not connect to the server<br>" .mysqli_connect_error());
    echo "Connected to the server<br>";
    mysqli_select_db($con, "1aa2")
    or die("Could not connect to the DB<br>" .mysqli_error($con));
    echo "Connected to the DB<br>";

    //Print data
    $dbP =  mysqli_query($con, "SELECT * from item")
    or die("Could not find the table.".mysqli_error($con));
    echo "<table border='1' width='40%'>";
    echo "<tr><th>Item Name</th><th>Item Type</th><th>Item ID</th><th>Year</th><th>Item ID</th>Cost</tr>";
    while ($row = mysqli_fetch_array($dbP))
    {
        echo "<tr><td>{$row['Item Name']}</td>";
        echo "<td>{$row['Item Type']}</td>";
        echo "<td>{$row['Item ID']}</td>
        echo "<tr><td>{$row['Year']}</td>";
        echo "<tr><td>{$row['Cost']}</td>"</tr>";
    }
    echo "</table><br>";

    mysqli_close($con);
?>
<!DOCTYPE html>
<html>
<body>
    <h1>Add a new item</h1>
    <form method="post" action="addItem.php">
        Item Name: <input type="text" name="item_name"><br>
        Item Type: <input type="text" name="item_type"><br>
        Item ID: <input type="text" name="item_id"><br>
        Year: <input type="text" name="year"><br>
        Cost: <input type="text" name="cost"><br>
        <button type="submit" name="add_item">Add Item</button>
        <button type="reset">Reset</button>
        <button type="submit" name="print_items">Print Items</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['add_item'])) {
            $itemName = $_POST['item_name'];
            $itemType = $_POST['item_type'];
            $itemID = $_POST['item_id'];
            $year = $_POST['year'];
            $cost = $_POST['cost'];

            echo "Item added: $itemName, $itemType, $itemID, $year, $cost";
        }

        if (isset($_POST['print_items'])) {
            echo "Printing all items...";
        }
    }
    ?>
</body>
</html>