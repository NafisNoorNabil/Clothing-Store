<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="product.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
</head>
<body>
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

</nav>

<?php
require_once('DBconnect.php');

// Retrieve product ID from query parameter
$product_id = $_GET['id'];

// Fetch product details from the database based on product ID
// Replace this with your own database connection and query logic
// Example assumes you have a database connection object named $conn
$query = "SELECT * FROM images WHERE id = $product_id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

// Check if product details are retrieved successfully
if ($row) {
  $image = $row['data'];
?>
<main>
  <section class="products">
    <h1><?php echo $row['name']; ?></h1>
    <img src="data:image/jpeg;base64,<?php echo base64_encode($image); ?>" alt="<?php echo $row['name']; ?>">
    <p>Price: <?php echo $row['price']; ?>৳</p>
    <form action="add_to_cart.php" method="post">
          <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
          <input type="hidden" name="product_name" value="<?php echo $row['name']; ?>">
          <input type="hidden" name="product_price" value="<?php echo $row['price']; ?>">
          <h2>Size</h2>
          <select name="size" id="size">  
            <option value="XL">XL</option>
            <option value="L">L</option>
            <option value="M">M</option>
            <option value="S">S</option>
          </select>
          <input class="cart" type="submit" name="add_to_cart" value="Add to Cart">
        </form>
  </section>
</main>
<?php
} else {
  echo "Product not found";
}
?>


  </body>
  </html>