<?php
require_once('DBconnect.php');

$query = "select product, product_id, price FROM cart";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cart.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>

<header>
        <header>
        <nav>
  <ul>
  <li><a href="home.php">Home</a></li>
    <li><a href="men.php">Men</a>
      <ul>
        <li><a href="men.php">Shirts</a></li>
        <li><a href="men.php">Pants</a></li>
        <li><a href="men.php">Jackets</a></li>
      </ul>
    </li>
    <li><a href="women.php">Women</a>
      <ul>
        <li><a href="women.php">Dresses</a></li>
        <li><a href="women.php">Tops</a></li>
        <li><a href="women.php">Bottoms</a></li>
      </ul>
    </li>
    <li><a href="shoes.php">Shoes</a></li>
    <li><a href="donate.php">Donate</a></li>

    <li class="search-bar">
    <form action="search.php" method="post">
      <input type="text" name="search" placeholder="Search...">
      <button type="submit"><i class="fas fa-search"></i></button>
    </form>

    </li>
  </ul>
</nav>



<?php
require_once('DBconnect.php');

$query = "select product, product_id,quantity, price FROM cart";
$result = mysqli_query($conn, $query);

?>

<?php
$totalPrice = 0; // Initialize total price?>
<form action="cart.php" method="post">
    <table class="tableclass">
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Action</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['product']; ?></td>
                <td><?php echo $row['price']; ?>TK</td>
                <td><?php echo $row['quantity']; ?></td>
                <td>
                    <button class="button" type="submit" name="action" value="delete_<?php echo $row['product_id']; ?>">Remove</button>
                </td>
            </tr>
            <?php
            $totalPrice += $row['price']; // Add current row's price to total price
        } ?>
        <tr>
            <td colspan="1">Total Price</td>
            <td><?php echo $totalPrice; ?>TK</td>
            <td>
            <td>

                <button class="button" type="submit" name="action" value="buy">Buy</button>
            </td> <!-- Display total price in the last row -->
        </tr>
    </table>
</form>

<?php
// Cart.php - Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  
    if (isset($_POST['action']) && strpos($_POST['action'], 'delete_') !== false) {
        // Extract product_id from action value
        $product_id = substr($_POST['action'], strlen('delete_'));

        // Delete product from cart table using product_id
        // Replace this with your actual logic to remove the product from the "cart" table in your database
        // For example:
         $query = "DELETE FROM cart WHERE product_id = $product_id";
        mysqli_query($conn, $query);

        // Redirect back to cart.php after removing the product
        header('Location: cart.php');
        exit;
    }
}
?>

</form>
<?php
// Assuming you have a database connection established
session_start();
if(isset($_SESSION['username'])){
    $username=$_SESSION['username'];
}
// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST["action"] == "buy") {  

            // Retrieve products from the "cart" table
            $query = "SELECT product, price FROM cart";
            $result = mysqli_query($conn, $query);
    
            // Store all products in the "products" database
            while ($row = mysqli_fetch_assoc($result)) {
                $product = $row['product'];
                $price = $row['price'];
                
                // Insert product into the "products" table
                $query = "INSERT INTO products  VALUES (' ','$username','$product', '$price')";
                mysqli_query($conn, $query);
            }
    
            // Redirect to a success page or perform any other desired action
            $query = "DELETE from cart";
            mysqli_query($conn, $query);
            header("Location: home.php");
            exit;
        } elseif (strpos($_POST["action"], "delete_") === 0) {
            // Handle product removal logic based on the value of $_POST["action"]
            // ...
        }
        } // Check if user is logged in

?>


</body>
</html>
