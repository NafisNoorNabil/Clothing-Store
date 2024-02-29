

<?php
require_once('DBconnect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="adminhome.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather&display=swap" rel="stylesheet">
</head>
<body>
    <nav>
        <ul>
            <li ><a class="underline" href="adminlogin.php">Logout</a></li>
        </ul>
    </nav>
    <h1>Orders</h1>


    <form action="adminhome.php" method="post">
    <table class="tableclass">
        <tr>
            <th>Name</th>
            <th>Product</th>
            <th>Price</th>
            <th>Cancel</th>
        </tr>

        <?php 
        // Update the SQL query to fetch data from the correct table
        $query = "SELECT name, product, price, id FROM products";
        $result = mysqli_query($conn, $query);
        $totalPrice = 0; // Initialize total price
        $count = 0;
        while ($row = mysqli_fetch_assoc($result)){
            $totalPrice += $row['price'];
            $count+=1; // Add price to total price
        ?>
        
        <tr>
            <td><?php echo $row['name'];?></td>
            <td><?php echo $row['product'];?></td>
            <td><?php echo $row['price'];?></td>
            <td>
                <button class="button" type="submit" name="action" value="delete_<?php echo $row['id']; ?>">Cancel</button>
            </td>
        </tr>

        <?php } ?>
        <tr>
            <td></td>
            <td><b>Total Price:</b></td>
            <td><b><?php echo $totalPrice; ?></b></td> <!-- Display total price -->
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td><b>Total Products:</b></td>
            <td><b><?php echo $count; ?></b></td> <!-- Display total price -->
            <td></td>
        </tr>
        <?php
        if(isset($_POST['action'])) {
            $action = $_POST['action'];
            $parts = explode('_', $action);
            $action_type = $parts[0];
            $mechanic_id = $parts[1];
        
            // Delete the mechanic from the database if the action is "delete"
            if ($action_type == "delete") {
                $sql = "DELETE FROM products WHERE id = $mechanic_id";
                
                if (mysqli_query($conn, $sql)) {
                    echo "Mechanic deleted successfully";
                    header("Location: adminhome.php");
                } else {
                    echo "Error deleting mechanic: " . mysqli_error($conn);
                }
            }
        }
        ?>
    </table>
</form>





</body>
</html>